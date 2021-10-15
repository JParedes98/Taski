@extends('layouts.mail')

@section('content')
    <span class="preheader">Account verification.</span>
    <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
        <tr>
            <td align="center">
                <table class="email-content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                    <tr>
                        <td class="email-masthead">
                            <a href="#"
                               class="f-fallback email-masthead_name">
                                <img src="{{ $message->embed(public_path() . '/images/logo.png') }}" style="style:100%;" alt="">
                            </a>
                        </td>
                    </tr>

                    <!-- Email Body -->
                    <tr>
                        <td class="email-body" width="100%" cellpadding="0" cellspacing="0">
                            <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0"
                                   role="presentation">
                                <!-- Body content -->
                                <tr>
                                    <td class="content-cell">
                                        <div class="f-fallback">
                                            <h1>Welcome to Taski!</h1>
                                            <p>Hello {{ $user->given_name }}, we are happy to see you around Taski. we have registered your account succesffully, now you onle need to verify it by clicking the "Confirm Account" button.</p>
                                            <!-- Action -->
                                            <table class="body-action" align="center" width="100%" cellpadding="0"
                                                   cellspacing="0" role="presentation">
                                                <tr>
                                                    <td align="center">
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0"
                                                               role="presentation">
                                                            <tr>
                                                                <td align="center">
                                                                    <a href="#"
                                                                       class="f-fallback button" target="_blank">Confirm Account</a>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                            <p>Thanks,
                                                <br>TASKI TEAM</p>
                                            <!-- Sub copy -->
                                            <table class="body-sub" role="presentation">
                                                <tr>
                                                    <td>
                                                        <p class="f-fallback sub">
                                                            If you are having issues with the button above. feel free to copy and paste the following url in your browser.
                                                        </p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table class="email-footer" align="center" width="570" cellpadding="0" cellspacing="0"
                                   role="presentation">
                                <tr>
                                    <td class="content-cell" align="center">
                                        <p class="f-fallback sub align-center">&copy; 2021 Taski.</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
@endsection
