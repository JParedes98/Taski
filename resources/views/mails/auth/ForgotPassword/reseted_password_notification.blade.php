@extends('layouts.mail')

@section('content')
    <span class="preheader">Password Updated.</span>
    <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
        <tr>
            <td align="center">
                <table class="email-content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                    <tr>
                        <td class="email-masthead">
                            <a href="" class="f-fallback email-masthead_name">
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
                                            <h1>Hey {{ $user->given_name }},</h1>
                                            <p>We have updated your password successfully, now you can access to <a href="">Taski.</a> with your new one.</p>

                                            <p>If you did not requested this password reset, send us an email to <strong>support@taski.com</strong>.</p>
                                            <p>TEAM TASKI</p>
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
