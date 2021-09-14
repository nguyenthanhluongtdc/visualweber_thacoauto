{{ header }}

<table width="100%">
    <tbody>
        <tr>
            <td class="wrapper" width="700" align="center">
                <table class="section" cellpadding="0" cellspacing="0" width="700" bgcolor="#f8f8f8">
                    <tr>
                        <td class="column" align="left">
                            <table>
                                <tbody>
                                <tr>
                                    <td align="left" style="padding: 20px 50px;">
                                        <p><strong>{{__('Hello, there is a new message for you from your site:')}}</strong></p>
                                        <p>{{__('Fullname')}}:{{ contact_name }}</p>
                                        <p>Email:{{ contact_email }}</p>
                                        {* <p>{{ contact_address }}</p> *}
                                        <p>{{__('Phone')}}:{{ contact_phone }}</p>
                                        <p>{{__('Content')}}:{{ contact_content }}</p>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td class="wrapper" width="700" align="center">
                <table class="section main" cellpadding="0" cellspacing="0" width="700">
                    <tr>
                        <td class="column" align="center">
                            <table>
                                <tbody>
                                <tr>
                                    <td align="center">
                                        <p>You can reply an email to {{ contact_email }} by clicking on below button.</p> <br />
                                        <a href="mailto:{{ contact_email }}" class="action-button">Answer</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
{{ footer }}
