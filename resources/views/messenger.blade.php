
<!DOCTYPE html>
<html lang="en">
<!-- Head -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1, shrink-to-fit=no, viewport-fit=cover">
    <title>Messenger</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="./assets/img/favicon/favicon.ico" type="image/x-icon">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700" rel="stylesheet">

    <!-- Template CSS -->
    @if((request()->is(app()->getLocale().'/dark*')))
        <link rel="stylesheet" href="{{asset('assets/css/template.dark.bundle.css')}}" media="(prefers-color-scheme: dark)">
    @endif
    <link rel="stylesheet" href="{{asset('assets/css/template.bundle.css')}}">

    @toastr_css - toastr css lib.



</head>

<body>

<!-- Layout -->
<div class="layout overflow-hidden">
    <!-- Navigation -->
    <nav class="navigation d-flex flex-column text-center navbar navbar-light hide-scrollbar">
        <!-- Brand -->
        <a href="index.html" title="Messenger" class="d-none d-xl-block mb-6">
            <svg version="1.1" width="46px" height="46px" fill="currentColor" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 46 46" enable-background="new 0 0 46 46" xml:space="preserve">
                        <polygon opacity="0.7" points="45,11 36,11 35.5,1 "/>
                <polygon points="35.5,1 25.4,14.1 39,21 "/>
                <polygon opacity="0.4" points="17,9.8 39,21 17,26 "/>
                <polygon opacity="0.7" points="2,12 17,26 17,9.8 "/>
                <polygon opacity="0.7" points="17,26 39,21 28,36 "/>
                <polygon points="28,36 4.5,44 17,26 "/>
                <polygon points="17,26 1,26 10.8,20.1 "/>
                    </svg>

        </a>

        <!-- Nav items -->
        <ul class="d-flex nav navbar-nav flex-row flex-xl-column flex-grow-1 justify-content-between justify-content-xl-center align-items-center w-100 py-4 py-lg-2 px-lg-3" role="tablist">
            <!-- Invisible item to center nav vertically -->
            <li class="nav-item d-none d-xl-block invisible flex-xl-grow-1">
                <a class="nav-link py-0 py-lg-8" href="#" title="">
                    <div class="icon icon-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </div>
                </a>
            </li>



            <!-- Friends -->
            <li class="nav-item">
                <a class="nav-link py-0 py-lg-8" id="tab-friends" href="#tab-content-friends" title="Friends" data-bs-toggle="tab" role="tab">
                    <div class="icon icon-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                    </div>
                </a>
            </li>

            <!-- Chats -->
            <li class="nav-item">
                <a class="nav-link active py-0 py-lg-8" id="tab-chats" href="#tab-content-chats" title="Chats" data-bs-toggle="tab" role="tab">
                    <div class="icon icon-xl icon-badged">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                        <div class="badge badge-circle bg-primary">
                            <span>4</span>
                        </div>
                    </div>
                </a>
            </li>



            <!-- Settings -->
            <li class="nav-item d-none d-xl-block">
                <a class="nav-link py-0 py-lg-8" id="tab-settings" href="#tab-content-settings" title="Settings" data-bs-toggle="tab" role="tab">
                    <div class="icon icon-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                    </div>
                </a>
            </li>

            <!-- Profile -->
            <li class="nav-item">
                <a href="#" class="nav-link p-0 mt-lg-2" data-bs-toggle="modal" data-bs-target="#modal-profile">
                    <div class="avatar avatar-online mx-auto d-none d-xl-block">
                        <img class="avatar-img" src="assets/img/avatars/1.jpg" alt="">
                    </div>
                    <div class="avatar avatar-online avatar-xs d-xl-none">
                        <img class="avatar-img" src="assets/img/avatars/1.jpg" alt="">
                    </div>
                </a>
            </li>
        </ul>
    </nav>

    <!-- Navigation -->

    <!-- Sidebar -->
    <aside class="sidebar bg-light">
        <div class="tab-content h-100" role="tablist">

            <!-- Friends -->
                   @include('partials.frinds')
          <!-- End Friends -->

            <!-- Chats -->
            @include('partials.chats')
            <!-- Chats -->



            <!-- Settings -->
            <div class="tab-pane fade h-100" id="tab-content-settings" role="tabpanel">
                <div class="d-flex flex-column h-100">
                    <div class="hide-scrollbar">
                        <div class="container py-8">

                            <!-- Title -->
                            <div class="mb-8">
                                <h2 class="fw-bold m-0">Settings</h2>
                            </div>

                            <!-- Search -->
                            <div class="mb-6">
                                <form action="#">
                                    <div class="input-group">
                                        <div class="input-group-text">
                                            <div class="icon icon-lg">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                            </div>
                                        </div>

                                        <input type="text" class="form-control form-control-lg ps-0" placeholder="Search messages or users" aria-label="Search for messages or users...">
                                    </div>
                                </form>
                            </div>

                            <!-- Profile -->
                         @include('partials.profile')
                            <!-- Profile -->

                            <!-- Account -->
                              @include('partials.account')
                            <!-- Account -->

                            <!-- Security -->
                             @include('partials.password')
                            <!-- Security -->







                        </div>
                    </div>
                </div>
            </div>
        </div>
    </aside>
    <!-- Sidebar -->

    <!-- Chat -->
    <main class="main is-visible" data-dropzone-area="">
        <div class="container h-100">

            <div class="d-flex flex-column h-100 position-relative">
                <!-- Chat: Header -->
                <div class="chat-header border-bottom py-4 py-lg-7">
                    <div class="row align-items-center">

                        <!-- Mobile: close -->
                        <div class="col-2 d-xl-none">
                            <a class="icon icon-lg text-muted" href="#" data-toggle-chat="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>
                            </a>
                        </div>
                        <!-- Mobile: close -->

                        <!-- Content -->
                        <div class="col-8 col-xl-12">
                            <div class="row align-items-center text-center text-xl-start">
                                <!-- Title -->
                                <div class="col-12 col-xl-6">
                                    <div class="row align-items-center gx-5">
                                        <div class="col-auto">
                                            <div class="avatar avatar-online d-none d-xl-inline-block">
                                                <img class="avatar-img" id="chat-avatar" src="assets/img/avatars/2.jpg" alt="">
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <!-- Title -->


                            </div>
                        </div>
                        <!-- Content -->

                        <!-- Mobile: more -->
                        <div class="col-2 d-xl-none text-end">
                            <a href="#" class="icon icon-lg text-muted" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-more" aria-controls="offcanvas-more">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                            </a>
                        </div>
                        <!-- Mobile: more -->

                    </div>
                </div>
                <!-- Chat: Header -->

                <!-- Chat: Content -->
                <div class="chat-body hide-scrollbar flex-1 h-100">
                    <div class="chat-body-inner">
                        <div class="py-6 py-lg-12" id="chat-body">

                            <!-- Message -->

                            <!-- Divider -->
                            <div class="message-divider">
                                <small class="text-muted">No Messages</small>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Chat: Content -->

                <!-- Chat: Footer -->
                <div class="chat-footer ">
                    <!-- Chat: Files -->
                    <div class="dz-preview bg-dark" id="dz-preview-row" data-horizontal-scroll="">
                    </div>
                    <!-- Chat: Files -->

                    <!-- Chat: Form -->
                    <form class="chat-form rounded-pill bg-dark" data-emoji-form="" method="post" action="{{route('api.messages.store')}}">
                       @csrf
                        <input type="hidden" name="conversation_id" value="{{$active_chat->id}}">
                        <div class="row align-items-center gx-0">
                            <div class="col-auto">
                                <a href="#" class="btn btn-icon btn-link text-body rounded-circle" id="dz-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-paperclip"><path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path></svg>
                                </a>
                            </div>

                            <div class="col">
                                <div class="input-group">
                                    <textarea name="message" class="form-control px-0" placeholder="Type your message..." rows="1" data-emoji-input="" data-autosize="true"></textarea>

                                    <a href="#" class="input-group-text text-body pe-0" data-emoji-btn="">
                                                <span class="icon icon-lg">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-smile"><circle cx="12" cy="12" r="10"></circle><path d="M8 14s1.5 2 4 2 4-2 4-2"></path><line x1="9" y1="9" x2="9.01" y2="9"></line><line x1="15" y1="9" x2="15.01" y2="9"></line></svg>
                                                </span>
                                    </a>
                                </div>
                            </div>

                            <div class="col-auto">
                                <button class="btn btn-icon btn-primary rounded-circle ms-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                                </button>
                            </div>
                        </div>
                    </form>
                    <!-- Chat: Form -->
                </div>
                <!-- Chat: Footer -->
            </div>

        </div>
    </main>
    <!-- Chat -->


<!-- Layout -->



<!-- Modal: Profile -->
 @include('partials.user-profile')

<!-- Modal: User profile -->


<!-- Modal: Media Preview -->
<div class="modal fade" id="modal-media-preview" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-fullscreen-xl-down">
        <div class="modal-content">

            <!-- Modal: Header -->
            <div class="modal-header">
                <button type="button" class="btn-close btn-close-arrow" data-bs-dismiss="modal" aria-label="Close"></button>

                <div>
                    <!-- Dropdown -->
                    <div class="dropdown">
                        <a class="icon text-muted" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    Download
                                    <div class="icon ms-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download-cloud"><polyline points="8 17 12 21 16 17"></polyline><line x1="12" y1="12" x2="12" y2="21"></line><path d="M20.88 18.09A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.29"></path></svg>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    Share
                                    <div class="icon ms-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share-2"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg>
                                    </div>
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center text-danger" href="#">
                                    <span class="me-auto">Delete</span>
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- Dropdown -->
                </div>
            </div>
            <!-- Modal: Header -->

            <!-- Modal: Body -->
            <div  class="modal-body p-0">
                <div class="d-flex align-items-center justify-content-center h-100">
                    <img class="img-fluid modal-preview-url" src="#" alt="#">
                </div>
            </div>
            <!-- Modal: Body -->

            <!-- Modal: Footer -->
            <div class="modal-footer">
                <div class="w-100 text-center">
                    <h6><a href="#">Marshall Wallaker</a></h6>
                    <p class="small">Today at 14:43</p>
                </div>
            </div>
            <!-- Modal: Footer -->
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{asset('js/moment.js')}}"></script>
<script src="{{asset('js/messenger.js')}}"></script>
<script src="{{asset('assets/js/vendor.js')}}"></script>
<script src="{{asset('assets/js/template.js')}}"></script>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
    const  user_id={{Auth::id()}}
    Pusher.logToConsole = true;

    var pusher = new Pusher('7ccce703a9ddea1a5ebb', {
        cluster: 'eu',
        authEndpoint: "/broadcasting/auth",
    });

    var channel = pusher.subscribe(`presence-Messenger.${user_id}`);
    channel.bind('new-message', function(data) {
      addMessage(data.message);
    });
</script>



    @toastr_js
    @toastr_render


</body>
</html>
