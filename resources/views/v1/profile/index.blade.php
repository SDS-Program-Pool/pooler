@extends('v1.layouts.app')

@section('content')

<main>
    <!-- Page header-->
    <header class="bg-dark">
        <div class="container-xl px-5"><h1 class="text-white py-3 mb-0 display-6">Account Settings - Profile</h1></div>
    </header>
    <!-- Account profile page content-->
    <div class="container-xl p-5">
        <!-- Tab bar navigation-->
        <Profile/>
        <mwc-tab-bar style="margin-bottom: -1px" activeIndex="2">
            <mwc-tab label="Billing" icon="account_balance" stacked onClick='location.href="app-account-billing.html"'></mwc-tab>
            <mwc-tab label="Notifications" icon="notifications" stacked onClick='location.href="app-account-notifications.html"'></mwc-tab>
            <mwc-tab label="Profile" icon="person" stacked onClick='location.href="{{route('profile.index')}}}}"'></mwc-tab>
            <mwc-tab label="Security" icon="security" stacked onClick='location.href="app-account-security.html"'></mwc-tab>
        </mwc-tab-bar>
        <!-- Divider-->
        <hr class="mt-0 mb-5" />
        <!-- Profile content row-->
        <div class="row gx-5">
            <div class="col-xl-12">
                <!-- Account details card-->
                <div class="card card-raised mb-5">
                    <div class="card-body p-5">
                        <div class="card-title">Account Details</div>
                        <div class="card-subtitle mb-4">Review and update your account information below.</div>
                        <form>
                            <!-- Form Group (username)-->
                            <div class="mb-4"><mwc-textfield class="w-100" label="Username" outlined value="{{$user->username}}" disabled></mwc-textfield></div>
                            <!-- Form Row-->
                            <div class="row mb-4">
                                <!-- Form Group (first name)-->
                                <div class="col-md-6"><mwc-textfield class="w-100" label="First Name" outlined value="{{$user->first_name}}" disabled></mwc-textfield></div>
                                <!-- Form Group (last name)-->
                                <div class="col-md-6"><mwc-textfield class="w-100" label="Last Name" outlined value="{{$user->last_name}}" disabled></mwc-textfield></div>
                            </div>
                            <!-- Form Group (email address)-->
                            <div class="mb-4"><mwc-textfield class="w-100" label="Email" outlined value="{{$user->email}}" disabled></mwc-textfield></mwc-textfield></div>
                            <!-- Form Row-->
                            <div class="row mb-4">
                                <!-- Form Group (phone number)-->
                                <div class="col-md-6"><mwc-textfield class="w-100" label="SMS Number" outlined type="tel" value="407-555-0187"></mwc-textfield></div>
                                <!-- Form Group (birth month)-->
                                <div class="col-md-6">
                                    <mwc-select class="w-100" outlined label="Birth Month">
                                        <mwc-list-item value="January" selected>January</mwc-list-item>
                                        <mwc-list-item value="February">February</mwc-list-item>
                                        <mwc-list-item value="March">March</mwc-list-item>
                                        <mwc-list-item value="April">April</mwc-list-item>
                                        <mwc-list-item value="May">May</mwc-list-item>
                                        <mwc-list-item value="June">June</mwc-list-item>
                                        <mwc-list-item value="July">July</mwc-list-item>
                                        <mwc-list-item value="August">August</mwc-list-item>
                                        <mwc-list-item value="September">September</mwc-list-item>
                                        <mwc-list-item value="October">October</mwc-list-item>
                                        <mwc-list-item value="November">November</mwc-list-item>
                                        <mwc-list-item value="December">December</mwc-list-item>
                                    </mwc-select>
                                </div>
                            </div>
                            <!-- Save changes button-->
                            <div class="text-end"><button class="btn btn-primary" type="button">Save changes</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection