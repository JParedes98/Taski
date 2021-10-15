@extends('layouts.mail')

@section('content')
    <span class="preheader">Password reset request.</span>
    <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
        <tr>
            <td align="center">
                <table class="email-content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                    <tr>
                        <td class="email-masthead">
                            <a href="#" class="f-fallback email-masthead_name">
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
                                            <h1>Hello {{ $user->given_name }},</h1>
                                            <p>We have received your password reset request, use the link below to update it.</p>

                                            <p>This password reset link is valid for 60 minutes.</p>

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
                                                                       class="f-fallback button" target="_blank">Reset Password</a>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                            <p>If you did not requested this, feel free to ignore this email.</p>
                                            <p>
                                                Gracias,
                                                <br>Equipo ESIGN
                                            </p>
                                            <!-- Sub copy -->
                                            <table class="body-sub" role="presentation">
                                                <tr>
                                                    <td>
                                                        <p class="f-fallback sub">If you are having issues with the button above, feel free to copy and paste the following url in your browser.</p>
                                                        <p class="f-fallback sub">
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
