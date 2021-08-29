@if ($contact)
    <p>{{ __("Xưng hô") }}: <i>{{ __("$contact->vocative") }}</i></p>
    <p>{{ trans('plugins/contact::contact.tables.time') }}: <i>{{ $contact->time }}</i></p>
    <p>{{ trans('plugins/contact::contact.tables.full_name') }}: <i>{{ $contact->name }}</i></p>
    <p>{{ trans('plugins/contact::contact.tables.email') }}: <i><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></i></p>
    <p>{{ trans('plugins/contact::contact.tables.phone') }}: <i>@if ($contact->phone) <a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a> @else N/A @endif</i></p>
@endif
