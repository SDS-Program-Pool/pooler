@extends('v1.layouts.app')

@section('content')

<main>
    <!-- Page header-->
    <header class="bg-dark">
        <div class="container-xl px-5"><h1 class="text-white py-3 mb-0 display-6">Account Settings - Security</h1></div>
    </header>
    <!-- Account security page content-->
    <div class="container-xl p-5">
        <!-- Tab bar navigation-->
        <mwc-tab-bar style="margin-bottom: -1px" activeIndex="3">
            <mwc-tab label="Billing" icon="account_balance" stacked onClick='location.href="app-account-billing.html"'></mwc-tab>
            <mwc-tab label="Notifications" icon="notifications" stacked onClick='location.href="app-account-notifications.html"'></mwc-tab>
            <mwc-tab label="Profile" icon="person" stacked onClick='location.href="app-account-profile.html"'></mwc-tab>
            <mwc-tab label="Security" icon="security" stacked onClick='location.href="app-account-security.html"'></mwc-tab>
        </mwc-tab-bar>
        <!-- Divider-->
        <hr class="mt-0 mb-5" />
        <!-- Security content row-->
        <div class="row gx-5">
            <div class="col-lg-7">
                <!-- Change password card-->
                <div class="card card-raised mb-5">
                    <div class="card-body p-5">
                        <div class="card-title">Change Password</div>
                        <div class="card-subtitle mb-4">New passwords must contain at least 8 characters.</div>
                        <form>
                            <div class="mb-4"><mwc-textfield class="w-100" label="Current Password" outlined type="password"></mwc-textfield></div>
                            <div class="mb-4"><mwc-textfield class="w-100" label="New Password" outlined type="password"></mwc-textfield></div>
                            <div class="mb-4"><mwc-textfield class="w-100" label="Confirm New Password" outlined type="password"></mwc-textfield></div>
                            <div class="text-end"><button class="btn btn-primary" type="submit">Reset Password</button></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <!-- Two factor authentication card-->
                <div class="card card-raised mb-5">
                    <div class="card-body p-5">
                        <div class="card-title">Two-Factor Authentication</div>
                        <div class="card-subtitle mb-4">Add another level of security to your account by enabling two-factor authentication. We will send you a text message to verify your login attempts on unrecognized devices and browsers.</div>
                        <form>
                            <div class="mb-4">
                                <mwc-formfield label="On"><mwc-radio name="twoFactorAuth" checked></mwc-radio></mwc-formfield>
                                <mwc-formfield label="Off"><mwc-radio name="twoFactorAuth"></mwc-radio></mwc-formfield>
                            </div>
                            <mwc-textfield class="w-100" label="SMS Number" outlined type="tel" value="407-555-0187"></mwc-textfield>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection