@if (Auth::user()->role == 'admin')
    {{-- Admin Menus Here --}}

    <ul class="side-menu">
        <li class="sub-category">
            <h3>Main</h3>
        </li>
        <li class="slide">
            <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ url('/admin/dashboard') }}"><i
                    class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Admin
                    Dashboard</span></a>
        </li>
        <li class="sub-category">
            <h3>Verification Applications</h3>
        </li>

        <li class="slide">
            <a class="side-menu__item has-link" data-bs-toggle="slide"
                href="{{ route('admin.verification.applications') }}"><i class="side-menu__icon fe fe-home"></i><span
                    class="side-menu__label">Applications</span></a>
        </li>

        <li class="sub-category">
            <h3>Donation Requests</h3>
        </li>

        <li class="slide">
            <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ route('admin.donation.requests') }}"><i
                    class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Donation Requests</span></a>
        </li>

    </ul>
@elseif(Auth::user()->role == 'donor')
    {{-- Donor Menus Here --}}

    <ul class="side-menu">

        <li class="sub-category">
            <h3>Main</h3>
        </li>
        <li class="slide">
            <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ url('/donor/dashboard') }}"><i
                    class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Dashboard</span></a>
        </li>


        @if (Auth::user()->verification == 'not_verified')
            <li class="sub-category">
                <h3>Verification Application</h3>
            </li>

            <li class="slide">
                <a class="side-menu__item has-link" data-bs-toggle="slide"
                    href="{{ route('donor.profile.edit') }}"><i class="side-menu__icon fe fe-home"></i><span
                        class="side-menu__label">Verify Your Self</span></a>
            </li>
        @else
        
        {{-- verified modules menus here --}}

        <li class="sub-category">
            <h3>Donation Requests</h3>
        </li>

        <li class="slide">
            <a class="side-menu__item has-link" data-bs-toggle="slide"
                href="{{ route('donor.donations.list') }}"><i class="side-menu__icon fe fe-home"></i><span
                    class="side-menu__label">Donation Requests</span></a>
        </li>

        <li class="slide">
            <a class="side-menu__item has-link" data-bs-toggle="slide"
                href="{{ route('donor.donations.accepted_requests_list') }}"><i class="side-menu__icon fe fe-home"></i><span
                    class="side-menu__label">Accepted Requests</span></a>
        </li>



        @endif


    </ul>
@else
    {{-- Receiver Menus Here --}}


    <ul class="side-menu">
        <li class="sub-category">
            <h3>Main</h3>
        </li>
        <li class="slide">
            <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ url('/receiver/dashboard') }}"><i
                    class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Receiver
                    Dashboard</span></a>
        </li>
        @if (Auth::user()->verification == 'not_verified')
            <li class="sub-category">
                <h3>Verification Application</h3>
            </li>

            <li class="slide">
                <a class="side-menu__item has-link" data-bs-toggle="slide"
                    href="{{ route('receiver.profile.edit') }}"><i class="side-menu__icon fe fe-home"></i><span
                        class="side-menu__label">Verify Your Self</span></a>
            </li>
        @else
            <li class="sub-category">
                <h3>Donations</h3>
            </li>

            <li class="slide">
                <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                        class="side-menu__icon fe fe-shopping-bag"></i><span class="side-menu__label">Donations</span><i
                        class="angle fe fe-chevron-right"></i>
                </a>
                <ul class="slide-menu">
                    <li class="panel sidetab-menu">
                        <div class="tab-menu-heading p-0 pb-2 border-0">

                        </div>
                        <div class="panel-body tabs-menu-body p-0 border-0">
                            <div class="tab-content">
                                <div class="tab-pane active" id="side13">
                                    <ul class="sidemenu-list">
                                        <li><a href="{{ route('receiver.donations.list') }}" class="slide-item"> View
                                                Requests</a></li>
                                        <li><a href="{{ route('receiver.donations.request_new') }}" class="slide-item">
                                                Request Donation</a></li>
                                    </ul>

                                </div>

                            </div>
                        </div>
                    </li>
                </ul>
            </li>
        @endif

    </ul>






    {{-- End If Main --}}
@endif
