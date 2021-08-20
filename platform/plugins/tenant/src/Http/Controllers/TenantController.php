<?php

namespace Platform\Tenant\Http\Controllers;

use Platform\Base\Events\BeforeEditContentEvent;
use Platform\Tenant\Http\Requests\TenantRequest;
use Platform\Tenant\Repositories\Interfaces\TenantInterface;
use Platform\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Platform\Tenant\Tables\TenantTable;
use Platform\Base\Events\CreatedContentEvent;
use Platform\Base\Events\DeletedContentEvent;
use Platform\Base\Events\UpdatedContentEvent;
use Platform\Base\Http\Responses\BaseHttpResponse;
use Platform\Tenant\Forms\TenantForm;
use Platform\Base\Forms\FormBuilder;
use Stancl\Tenancy\Database\Models\Domain;
use Illuminate\Support\Str;

class TenantController extends BaseController
{
    /**
     * @var TenantInterface
     */
    protected $tenantRepository;

    /**
     * @param TenantInterface $tenantRepository
     */
    public function __construct(TenantInterface $tenantRepository)
    {
        $this->tenantRepository = $tenantRepository;
    }

    /**
     * @param TenantTable $table
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(TenantTable $table)
    {
        page_title()->setTitle(trans('plugins/tenant::tenant.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/tenant::tenant.create'));

        return $formBuilder->create(TenantForm::class)->renderForm();
    }

    /**
     * @param TenantRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function store(TenantRequest $request, BaseHttpResponse $response)
    {
        $request->merge(['id' => Str::uuid()]);
        $param = $request->input();
        $allDomains = Domain::all()->map(function ($item){
            return @$item->domain;
        })->toArray();
        $domains = [Str::slug($param['name']).'@thacoauto.com'];

        /*Kiểm tra xem mảng domain mới nhập vào có domain nào đã tồn tại trong bảng domains hay chưa*/
        $check = !empty(array_intersect($domains, $allDomains));

        if($check == true){
            $unique = json_encode(array_intersect($domains, $allDomains));
            return redirect()->back()
                ->withInput()
                ->withErrors(['website' => sprintf('Tên đã tồn tại trên hệ thống.', $unique)]);
        }

        $tenant = $this->tenantRepository->create(
            [
                'id' => $param['id'],
                'name' => $param['name'] ?: '',
                'status' => $param['status'] ?: BaseStatusEnum::PUBLISHED,
            ]
        );

        $tenant->domains()->delete();

        foreach ($domains as $domain){
            if (!blank($domain)) {
                $tenant->domains()->create(['domain' => $domain]);
            }
        }
        event(new CreatedContentEvent(TENANT_MODULE_SCREEN_NAME, $request, $tenant));

        return $response
            ->setPreviousUrl(route('tenant.index'))
            ->setNextUrl(route('tenant.edit', $tenant->id))
            ->setMessage(trans('core/base::notices.create_success_message'));
    }

    /**
     * @param int $id
     * @param Request $request
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function edit($id, FormBuilder $formBuilder, Request $request)
    {
        $tenant = $this->tenantRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $tenant));

        page_title()->setTitle(trans('plugins/tenant::tenant.edit') . ' "' . $tenant->name . '"');

        return $formBuilder->create(TenantForm::class, ['model' => $tenant])->renderForm();
    }

    /**
     * @param int $id
     * @param TenantRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function update($id, TenantRequest $request, BaseHttpResponse $response)
    {
        $param = $request->input();

        $tenant = $this->tenantRepository->findOrFail($id);

        $allDomains = Domain::where('tenant_id', '!=', $tenant->id)->get()->map(function ($item){
            return @$item->domain;
        })->toArray();
        $domains = [Str::slug($param['name']).'@thacoauto.com'];

        /*Kiểm tra xem mảng domain mới nhập vào có domain nào đã tồn tại trong bảng domains hay chưa*/
        $check = !empty(array_intersect($domains, $allDomains));

        if($check == true){
            $unique = json_encode(array_values(array_intersect($domains, $allDomains)));
            return redirect()->back()
                ->withInput()
                ->withErrors(['website' => sprintf('Tên đã tồn tại trên hệ thống.', $unique)]);
        }

        $tenant->fill($param);

        $this->tenantRepository->createOrUpdate($tenant);
        $tenant->domains()->delete();

        foreach ($domains as $domain){
            if (!blank($domain)) {
                $tenant->domains()->create(['domain' => $domain]);
            }
        }

        event(new UpdatedContentEvent(TENANT_MODULE_SCREEN_NAME, $request, $tenant));

        return $response
            ->setPreviousUrl(route('tenant.index'))
            ->setMessage(trans('core/base::notices.update_success_message'));
    }

    /**
     * @param int $id
     * @param Request $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function destroy(Request $request, $id, BaseHttpResponse $response)
    {
        try {
            $tenant = $this->tenantRepository->findOrFail($id);

            $this->tenantRepository->delete($tenant);

            event(new DeletedContentEvent(TENANT_MODULE_SCREEN_NAME, $request, $tenant));

            return $response->setMessage(trans('core/base::notices.delete_success_message'));
        } catch (Exception $exception) {
            return $response
                ->setError()
                ->setMessage($exception->getMessage());
        }
    }

    /**
     * @param Request $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     * @throws Exception
     */
    public function deletes(Request $request, BaseHttpResponse $response)
    {
        $ids = $request->input('ids');
        if (empty($ids)) {
            return $response
                ->setError()
                ->setMessage(trans('core/base::notices.no_select'));
        }

        foreach ($ids as $id) {
            $tenant = $this->tenantRepository->findOrFail($id);
            $this->tenantRepository->delete($tenant);
            event(new DeletedContentEvent(TENANT_MODULE_SCREEN_NAME, $request, $tenant));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
