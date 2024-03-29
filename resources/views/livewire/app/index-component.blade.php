

    <!-- Begin page -->
    <div class="layout-wrapper landing">
        <nav class="navbar navbar-expand-lg navbar-landing navbar-light fixed-top" id="navbar">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img style="height: 40px;" src="{{ asset('assets/admin/images/logo.png') }}" class="card-logo card-logo-dark"
                        alt="logo dark" height="17">
                    <img style="height: 40px;" src="{{ asset('assets/admin/images/logo-light.png') }}" class="card-logo card-logo-light"
                        alt="logo light" height="17">
                </a>
                <button class="navbar-toggler py-0 fs-20 text-body" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <i class="mdi mdi-menu"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mt-2 mt-lg-0" id="navbar-example">
                        <li class="nav-item">
                            <a class="nav-link fs-15 active" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-15" href="#">Wallet</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-15" href="#">Marketplace</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-15" href="#">Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-15" href="#">Creators</a>
                        </li>
                    </ul>

                    <div class="">
                        <a href="#" class="btn btn-success">Wallet Connect</a>
                    </div>
                </div>

            </div>
        </nav>
        <div class="bg-overlay bg-overlay-pattern"></div>
        <!-- end navbar -->

        <!-- start hero section -->
        <section class="section nft-hero" id="hero">
            <div class="bg-overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div style="background: #212529" class="card-header">
                                <h5 style="color: #d1d0d0;" class="card-title mb-0">Basic Datatables</h5>
                            </div>
                            <div style="background: #212529" class="card-body">
                                <table id="example"
                                    class="table table-bordered dt-responsive nowrap table-striped align-middle"
                                    style="width:100%">
                                    <thead style="color: #d1d0d0;">
                                        <tr>
                                            <th>Website URL</th>
                                            <th>Register Date</th>
                                            <th>Expire Date</th>
                                            <th>Last Report</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($site_status as $item)
                                           <tr>
                                            <td><span class="badge badge-soft-info"><a href="{{ $item->url }}" target="_blank">{{ $item->url }}</a></span></td>
                                            <td><span class="badge badge-soft-info">{{ $item->created_on }}</span></td>
                                            <td><span class="badge badge-soft-info">{{ $item->expire_date }}</span></td>
                                            <td><span class="badge badge-soft-info">{{ $item->site_status }}</span></td>
                                            <td>
                                                <button type="button" class="btn btn-success position-relative">
                                                    {{ $item->site_status }}
                                                </button>
                                            </td>
                                        </tr>  
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end container -->
        </section><!-- end hero section -->
        <!-- end marketplace -->
        <!-- Start footer -->
        <footer class="custom-footer bg-dark py-5 position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mt-4">
                        <div>
                            <div>
                                <img src="{{ asset('assets/admin/images/logo-light.png') }}" alt="logo light"
                                    height="17">
                            </div>
                            <div class="mt-4">
                                <p>Premium Multipurpose Admin & Dashboard Template</p>
                                <p>You can build any type of web application like eCommerce, CRM, CMS, Project
                                    management apps, Admin Panels, etc using Velzon.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7 ms-lg-auto">
                        <div class="row">
                            <div class="col-sm-4 mt-4">
                                <h5 class="text-white mb-0">Company</h5>
                                <div class="text-muted mt-3">
                                    <ul class="list-unstyled ff-secondary footer-list">
                                        <li><a href="#">About Us</a></li>
                                        <li><a href="#">Gallery</a></li>
                                        <li><a href="#l">Projects</a></li>
                                        <li><a href="#">Timeline</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-4 mt-4">
                                <h5 class="text-white mb-0">Apps Pages</h5>
                                <div class="text-muted mt-3">
                                    <ul class="list-unstyled ff-secondary footer-list">
                                        <li><a href="#">Calendar</a></li>
                                        <li><a href="#">Mailbox</a></li>
                                        <li><a href="#">Chat</a></li>
                                        <li><a href="#">Deals</a></li>
                                        <li><a href="#">Kanban Board</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-4 mt-4">
                                <h5 class="text-white mb-0">Support</h5>
                                <div class="text-muted mt-3">
                                    <ul class="list-unstyled ff-secondary footer-list">
                                        <li><a href="#">FAQ</a></li>
                                        <li><a href="#">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row text-center text-sm-start align-items-center mt-5">
                    <div class="col-sm-6">

                        <div>
                            <p class="copy-rights mb-0">
                                <script>
                                    document.write(new Date().getFullYear()) 
                                </script> © Velzon - Themesbrand
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end mt-3 mt-sm-0">
                            <ul class="list-inline mb-0 footer-social-link">
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="avatar-xs d-block">
                                        <div class="avatar-title rounded-circle">
                                            <i class="ri-facebook-fill"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="avatar-xs d-block">
                                        <div class="avatar-title rounded-circle">
                                            <i class="ri-github-fill"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="avatar-xs d-block">
                                        <div class="avatar-title rounded-circle">
                                            <i class="ri-linkedin-fill"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="avatar-xs d-block">
                                        <div class="avatar-title rounded-circle">
                                            <i class="ri-google-fill"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="avatar-xs d-block">
                                        <div class="avatar-title rounded-circle">
                                            <i class="ri-dribbble-line"></i>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <button onclick="topFunction()" class="btn btn-danger btn-icon landing-back-top" id="back-to-top">
            <i class="ri-arrow-up-line"></i>
        </button>
    </div>