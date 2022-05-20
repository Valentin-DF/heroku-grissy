<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Modals - SB Admin Pro</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>
</head>

<body class="nav-fixed">
    <?php include "eP_nav.html"; ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
        <?php include "eP_sidevar.html"; ?>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
                    <div class="container-xl px-4">
                        <div class="page-header-content pt-4">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-auto mt-4">
                                    <h1 class="page-header-title">
                                        <div class="page-header-icon"><i data-feather="external-link"></i></div>
                                        Modals
                                    </h1>
                                    <div class="page-header-subtitle">Dialog boxes to display lightbox, notifications, or other custom content</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <!-- Main page content-->
                <div class="container-xl px-4 mt-n10">
                    <div class="row">
                        <div class="col-lg-9">
                            <!-- Default Bootstrap Modal-->
                            <div id="default">
                                <div class="card mb-4">
                                    <div class="card-header">Default Bootstrap Modal</div>
                                    <div class="card-body">
                                        <h6 class="small text-muted fw-500">Modal Default:</h6>
                                        <!-- Component Preview-->
                                        <div class="sbp-preview mb-4">
                                            <div class="sbp-preview-content">
                                                <!-- Button trigger modal-->
                                                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Launch Demo Modal</button>
                                                <!-- Modal-->
                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Default Bootstrap Modal</h5>
                                                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">This modal window is included with the Bootstrap framework. The styling has been changed for the SB Admin Pro theme.</div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                                                                <button class="btn btn-primary" type="button">Save changes</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="sbp-preview-code">
                                                <!-- Code sample-->
                                                <ul class="nav nav-tabs" id="modalDefaultTabs" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active me-1" id="modalDefaultHtmlTab" data-bs-toggle="tab" href="#modalDefaultHtml" role="tab" aria-controls="modalDefaultHtml" aria-selected="true">
                                                            <i class="fab fa-html5 text-orange me-1"></i>
                                                            HTML
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="modalDefaultPugTab" data-bs-toggle="tab" href="#modalDefaultPug" role="tab" aria-controls="modalDefaultPug" aria-selected="false">
                                                            <img class="img-pug me-1" src="assets/img/demo/pug.svg" />
                                                            PUG
                                                        </a>
                                                    </li>
                                                </ul>
                                                <!-- Tab panes-->
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="modalDefaultHtml" role="tabpanel" aria-labelledby="modalDefaultHtmlTab">
                                                        <pre class="language-markup"><code><script type="text/plain"><!-- Button trigger modal -->
<button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Launch Demo Modal</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Default Bootstrap Modal</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">...</div>
            <div class="modal-footer"><button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-primary" type="button">Save changes</button></div>
        </div>
    </div>
</div></script></code></pre>
                                                    </div>
                                                    <div class="tab-pane" id="modalDefaultPug" role="tabpanel" aria-labelledby="modalDefaultPugTab">
                                                        <pre class="language-pug"><code>//- Button trigger modal
button.btn.btn-primary(type='button', data-bs-toggle='modal', data-bs-target='#exampleModal')
    | Launch Demo Modal
//- Modal
#exampleModal.modal.fade(tabindex='-1', role='dialog', aria-labelledby='exampleModalLabel', aria-hidden='true')
    .modal-dialog(role='document')
        .modal-content
            .modal-header
                h5#exampleModalLabel.modal-title Default Bootstrap Modal
                button.btn-close(type='button', data-bs-dismiss='modal', aria-label='Close')
            .modal-body
                | ...
            .modal-footer
                button.btn.btn-secondary(type='button', data-bs-dismiss='modal') Close
                button.btn.btn-primary(type='button') Save changes</code></pre>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="sbp-preview-text">The default Bootstrap modal has been restyled for the SB Admin Pro theme.</div>
                                        </div>
                                        <h6 class="small text-muted fw-500">Static Backdrop:</h6>
                                        <!-- Component Preview-->
                                        <div class="sbp-preview">
                                            <div class="sbp-preview-content">
                                                <!-- Button trigger modal-->
                                                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Launch Static Backdrop Modal</button>
                                                <!-- Modal-->
                                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="staticBackdropLabel">Static Backdrop Modal</h5>
                                                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                When using the
                                                                <code>data-bs-backdrop='static'</code>
                                                                attribute with a modal window, the user cannot dismiss the modal by clicking outside of the modal pane.
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                                                                <button class="btn btn-primary" type="button">Understood</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="sbp-preview-code">
                                                <!-- Code sample-->
                                                <ul class="nav nav-tabs" id="modalDefaultStaticTabs" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active me-1" id="modalDefaultStaticHtmlTab" data-bs-toggle="tab" href="#modalDefaultStaticHtml" role="tab" aria-controls="modalDefaultStaticHtml" aria-selected="true">
                                                            <i class="fab fa-html5 text-orange me-1"></i>
                                                            HTML
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="modalDefaultStaticPugTab" data-bs-toggle="tab" href="#modalDefaultStaticPug" role="tab" aria-controls="modalDefaultStaticPug" aria-selected="false">
                                                            <img class="img-pug me-1" src="assets/img/demo/pug.svg" />
                                                            PUG
                                                        </a>
                                                    </li>
                                                </ul>
                                                <!-- Tab panes-->
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="modalDefaultStaticHtml" role="tabpanel" aria-labelledby="modalDefaultStaticHtmlTab">
                                                        <pre class="language-markup"><code><script type="text/plain"><!-- Button trigger modal -->
<button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Launch Static Backdrop Modal</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Static Backdrop Modal</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">...</div>
            <div class="modal-footer"><button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-primary" type="button">Understood</button></div>
        </div>
    </div>
</div></script></code></pre>
                                                    </div>
                                                    <div class="tab-pane" id="modalDefaultStaticPug" role="tabpanel" aria-labelledby="modalDefaultStaticPugTab">
                                                        <pre class="language-pug"><code>//- Button trigger modal
button.btn.btn-primary(type='button', data-bs-toggle='modal', data-bs-target='#staticBackdrop')
    | Launch Static Backdrop Modal
//- Modal
#staticBackdrop.modal.fade(data-bs-backdrop='static', tabindex='-1', role='dialog', aria-labelledby='staticBackdropLabel', aria-hidden='true')
    .modal-dialog(role='document')
        .modal-content
            .modal-header
                h5#staticBackdropLabel.modal-title Static Backdrop Modal
                button.btn-close(type='button', data-bs-dismiss='modal', aria-label='Close')
            .modal-body
                | ...
            .modal-footer
                button.btn.btn-secondary(type='button', data-bs-dismiss='modal') Close
                button.btn.btn-primary(type='button') Understood</code></pre>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="sbp-preview-text">The static backdrop modal option cannot be dismissed by clicking outside of the modal pane. Instead, the user must dismiss the modal by using the close button within the modal pane.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Scrollable Bootstrap Modal-->
                            <div id="scrollable">
                                <div class="card mb-4">
                                    <div class="card-header">Scrollable Bootstrap Modals</div>
                                    <div class="card-body">
                                        <h6 class="small text-muted fw-500">Page Scrolling Long Modal:</h6>
                                        <!-- Component Preview-->
                                        <div class="sbp-preview mb-4">
                                            <div class="sbp-preview-content">
                                                <!-- Button trigger modal-->
                                                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalLong">Launch Scrollable Modal</button>
                                                <!-- Modal-->
                                                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">Long Modal with Page Scrolling</h5>
                                                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                                                                <button class="btn btn-primary" type="button">Save changes</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="sbp-preview-code">
                                                <!-- Code sample-->
                                                <ul class="nav nav-tabs" id="modalScrollingTabs" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active me-1" id="modalScrollingHtmlTab" data-bs-toggle="tab" href="#modalScrollingHtml" role="tab" aria-controls="modalScrollingHtml" aria-selected="true">
                                                            <i class="fab fa-html5 text-orange me-1"></i>
                                                            HTML
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="modalScrollingPugTab" data-bs-toggle="tab" href="#modalScrollingPug" role="tab" aria-controls="modalScrollingPug" aria-selected="false">
                                                            <img class="img-pug me-1" src="assets/img/demo/pug.svg" />
                                                            PUG
                                                        </a>
                                                    </li>
                                                </ul>
                                                <!-- Tab panes-->
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="modalScrollingHtml" role="tabpanel" aria-labelledby="modalScrollingHtmlTab">
                                                        <pre class="language-markup"><code><script type="text/plain"><!-- Button trigger modal -->
<button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalLong">Launch Scrollable Modal</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Long Modal with Page Scrolling</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer"><button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-primary" type="button">Save changes</button></div>
        </div>
    </div>
</div></script></code></pre>
                                                    </div>
                                                    <div class="tab-pane" id="modalScrollingPug" role="tabpanel" aria-labelledby="modalScrollingPugTab">
                                                        <pre class="language-pug"><code>//- Button trigger modal
button.btn.btn-primary(type='button', data-bs-toggle='modal', data-bs-target='#exampleModalLong')
    | Launch Scrollable Modal
//- Modal
#exampleModalLong.modal.fade(tabindex='-1', role='dialog', aria-labelledby='exampleModalLongTitle', aria-hidden='true')
    .modal-dialog(role='document')
        .modal-content
            .modal-header
                h5#exampleModalLongTitle.modal-title Long Modal with Page Scrolling
                button.btn-close(type='button', data-bs-dismiss='modal', aria-label='Close')
            .modal-body
                | ...
            .modal-footer
                button.btn.btn-secondary(type='button', data-bs-dismiss='modal') Close
                button.btn.btn-primary(type='button') Save changes</code></pre>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="sbp-preview-text">By default, the content within a modal will scroll independently of the page if the content is too long. If you don't want the page to scroll, use the next option.</div>
                                        </div>
                                        <h6 class="small text-muted fw-500">Modal Dialog Scrolling Long Modal:</h6>
                                        <!-- Component Preview-->
                                        <div class="sbp-preview">
                                            <div class="sbp-preview-content">
                                                <!-- Button trigger modal-->
                                                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalScrollable">Launch Scrollable Modal</button>
                                                <!-- Modal-->
                                                <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalScrollableTitle">Modal title</h5>
                                                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                                                                <button class="btn btn-primary" type="button">Save changes</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="sbp-preview-code">
                                                <!-- Code sample-->
                                                <ul class="nav nav-tabs" id="modalScrollingDialogTabs" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active me-1" id="modalScrollingDialogHtmlTab" data-bs-toggle="tab" href="#modalScrollingDialogHtml" role="tab" aria-controls="modalScrollingDialogHtml" aria-selected="true">
                                                            <i class="fab fa-html5 text-orange me-1"></i>
                                                            HTML
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="modalScrollingDialogPugTab" data-bs-toggle="tab" href="#modalScrollingDialogPug" role="tab" aria-controls="modalScrollingDialogPug" aria-selected="false">
                                                            <img class="img-pug me-1" src="assets/img/demo/pug.svg" />
                                                            PUG
                                                        </a>
                                                    </li>
                                                </ul>
                                                <!-- Tab panes-->
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="modalScrollingDialogHtml" role="tabpanel" aria-labelledby="modalScrollingDialogHtmlTab">
                                                        <pre class="language-markup"><code><script type="text/plain"><!-- Button modal trigger -->
<button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalScrollable">Launch Scrollable Modal</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Modal title</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer"><button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-primary" type="button">Save changes</button></div>
        </div>
    </div>
</div></script></code></pre>
                                                    </div>
                                                    <div class="tab-pane" id="modalScrollingDialogPug" role="tabpanel" aria-labelledby="modalScrollingDialogPugTab">
                                                        <pre class="language-pug"><code>//- Button trigger modal
button.btn.btn-primary(type='button', data-bs-toggle='modal', data-bs-target='#exampleModalScrollable')
    | Launch Scrollable Modal
//- Modal
#exampleModalScrollable.modal.fade(tabindex='-1', role='dialog', aria-labelledby='exampleModalScrollableTitle', aria-hidden='true')
    .modal-dialog.modal-dialog-scrollable(role='document')
        .modal-content
            .modal-header
                h5#exampleModalScrollableTitle.modal-title Modal title
                button.btn-close(type='button', data-bs-dismiss='modal', aria-label='Close')
            .modal-body
                | ...
            .modal-footer
                button.btn.btn-secondary(type='button', data-bs-dismiss='modal') Close
                button.btn.btn-primary(type='button') Save changes</code></pre>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="sbp-preview-text">
                                                Add
                                                <code>.modal-dialog-scrollable</code>
                                                to the
                                                <code>.modal-dialog</code>
                                                to make longer modal content scroll within the modal body if the contents is longer than the viewport height.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Vertically Centered Bootstrap Modal-->
                            <div id="centered">
                                <div class="card mb-4">
                                    <div class="card-header">Vertically Centered Bootstrap Modal</div>
                                    <div class="card-body">
                                        <!-- Component Preview-->
                                        <div class="sbp-preview">
                                            <div class="sbp-preview-content">
                                                <!-- Button trigger modal-->
                                                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Launch Vertically Centered Modal</button>
                                                <!-- Modal-->
                                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalCenterTitle">Vertically Centered Modal</h5>
                                                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">The vertically centered modal centers the modal dialog in the center of the page.</div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                                                                <button class="btn btn-primary" type="button">Save changes</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="sbp-preview-code">
                                                <!-- Code sample-->
                                                <ul class="nav nav-tabs" id="modalCenteredTabs" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active me-1" id="modalCenteredHtmlTab" data-bs-toggle="tab" href="#modalCenteredHtml" role="tab" aria-controls="modalCenteredHtml" aria-selected="true">
                                                            <i class="fab fa-html5 text-orange me-1"></i>
                                                            HTML
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="modalCenteredPugTab" data-bs-toggle="tab" href="#modalCenteredPug" role="tab" aria-controls="modalCenteredPug" aria-selected="false">
                                                            <img class="img-pug me-1" src="assets/img/demo/pug.svg" />
                                                            PUG
                                                        </a>
                                                    </li>
                                                </ul>
                                                <!-- Tab panes-->
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="modalCenteredHtml" role="tabpanel" aria-labelledby="modalCenteredHtmlTab">
                                                        <pre class="language-markup"><code><script type="text/plain"><!-- Button trigger modal -->
<button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Launch Vertically Centered Modal</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Vertically Centered Modal</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">...</div>
            <div class="modal-footer"><button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-primary" type="button">Save changes</button></div>
        </div>
    </div>
</div></script></code></pre>
                                                    </div>
                                                    <div class="tab-pane" id="modalCenteredPug" role="tabpanel" aria-labelledby="modalCenteredPugTab">
                                                        <pre class="language-pug"><code>//- Button trigger modal
button.btn.btn-primary(type='button', data-bs-toggle='modal', data-bs-target='#exampleModalCenter')
    | Launch Vertically Centered Modal
//- Modal
#exampleModalCenter.modal.fade(tabindex='-1', role='dialog', aria-labelledby='exampleModalCenterTitle', aria-hidden='true')
    .modal-dialog.modal-dialog-centered(role='document')
        .modal-content
            .modal-header
                h5#exampleModalCenterTitle.modal-title Vertically Centered Modal
                button.btn-close(type='button', data-bs-dismiss='modal', aria-label='Close')
            .modal-body
                | ...
            .modal-footer
                button.btn.btn-secondary(type='button', data-bs-dismiss='modal') Close
                button.btn.btn-primary(type='button') Save changes</code></pre>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="sbp-preview-text">
                                                Add
                                                <code>.modal-dialog-centered</code>
                                                to the
                                                <code>.modal-dialog</code>
                                                to vertically center the modal dilog when the modal window appears.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Sizing-->
                            <div id="sizing">
                                <div class="card mb-4">
                                    <div class="card-header">Modal Sizing</div>
                                    <div class="card-body">
                                        <!-- Component Preview-->
                                        <div class="sbp-preview">
                                            <div class="sbp-preview-content">
                                                <!-- Extra large modal-->
                                                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalXl">Extra Large</button>
                                                <div class="modal fade" id="exampleModalXl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Extra Large Modal</h5>
                                                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>This is an example of an extra large modal!</p>
                                                            </div>
                                                            <div class="modal-footer"><button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Large modal-->
                                                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalLg">Large</button>
                                                <div class="modal fade" id="exampleModalLg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Large Modal</h5>
                                                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>This is an example of a large modal.</p>
                                                            </div>
                                                            <div class="modal-footer"><button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Small modal-->
                                                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalSm">Small</button>
                                                <div class="modal fade" id="exampleModalSm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-sm" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Small Modal</h5>
                                                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>This is an example of a small modal.</p>
                                                            </div>
                                                            <div class="modal-footer"><button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="sbp-preview-code">
                                                <!-- Code sample-->
                                                <ul class="nav nav-tabs" id="modalSizingTabs" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active me-1" id="modalSizingHtmlTab" data-bs-toggle="tab" href="#modalSizingHtml" role="tab" aria-controls="modalSizingHtml" aria-selected="true">
                                                            <i class="fab fa-html5 text-orange me-1"></i>
                                                            HTML
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="modalSizingPugTab" data-bs-toggle="tab" href="#modalSizingPug" role="tab" aria-controls="modalSizingPug" aria-selected="false">
                                                            <img class="img-pug me-1" src="assets/img/demo/pug.svg" />
                                                            PUG
                                                        </a>
                                                    </li>
                                                </ul>
                                                <!-- Tab panes-->
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="modalSizingHtml" role="tabpanel" aria-labelledby="modalSizingHtmlTab">
                                                        <pre class="language-markup"><code><script type="text/plain"><!-- Extra large modal -->
<button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalXl">Extra Large</button>
<div class="modal fade" id="exampleModalXl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Extra Large Modal</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>This is an example of an extra large modal!</p>
            </div>
            <div class="modal-footer"><button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button></div>
        </div>
    </div>
</div>

<!-- Large modal -->
<button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalLg">Large</button>
<div class="modal fade" id="exampleModalLg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Large Modal</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>This is an example of a large modal.</p>
            </div>
            <div class="modal-footer"><button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button></div>
        </div>
    </div>
</div>

<!-- Small modal -->
<button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalSm">Small</button>
<div class="modal fade" id="exampleModalSm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Small Modal</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>This is an example of a small modal.</p>
            </div>
            <div class="modal-footer"><button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button></div>
        </div>
    </div>
</div></script></code></pre>
                                                    </div>
                                                    <div class="tab-pane" id="modalSizingPug" role="tabpanel" aria-labelledby="modalSizingPugTab">
                                                        <pre class="language-pug"><code>//- Extra large modal
button.btn.btn-primary(type='button', data-bs-toggle='modal', data-bs-target='#exampleModalXl') Extra Large
.modal.fade#exampleModalXl(tabindex='-1', role='dialog', aria-labelledby='myExtraLargeModalLabel', aria-hidden='true')
    .modal-dialog.modal-xl(role='document')
        .modal-content
            .modal-header
                h5.modal-title Extra Large Modal
                button.btn-close(type='button', data-bs-dismiss='modal', aria-label='Close')
            .modal-body
                p This is an example of an extra large modal!
            .modal-footer
                button.btn.btn-primary(type='button', data-bs-dismiss='modal') Close
//- Large modal
button.btn.btn-primary(type='button', data-bs-toggle='modal', data-bs-target='#exampleModalLg') Large
.modal.fade#exampleModalLg(tabindex='-1', role='dialog', aria-labelledby='myLargeModalLabel', aria-hidden='true')
    .modal-dialog.modal-lg(role='document')
        .modal-content
            .modal-header
                h5.modal-title Large Modal
                button.btn-close(type='button', data-bs-dismiss='modal', aria-label='Close')
            .modal-body
                p This is an example of a large modal.
            .modal-footer
                button.btn.btn-primary(type='button', data-bs-dismiss='modal') Close
//- Small modal
button.btn.btn-primary(type='button', data-bs-toggle='modal', data-bs-target='#exampleModalSm') Small
.modal.fade#exampleModalSm(tabindex='-1', role='dialog', aria-labelledby='mySmallModalLabel', aria-hidden='true')
    .modal-dialog.modal-sm(role='document')
        .modal-content
            .modal-header
                h5.modal-title Small Modal
                button.btn-close(type='button', data-bs-dismiss='modal', aria-label='Close')
            .modal-body
                p This is an example of a small modal.
            .modal-footer
                button.btn.btn-primary(type='button', data-bs-dismiss='modal') Close</code></pre>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="sbp-preview-text">
                                                Add
                                                <code>.modal-xl</code>
                                                ,
                                                <code>.modal-lg</code>
                                                , or
                                                <code>.modal-sm</code>
                                                to the
                                                <code>.modal-dialog</code>
                                                to adjust the sizing of your Bootstrap modals.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Bootstrap Docs Link-->
                            <div class="card card-icon mb-4">
                                <div class="row g-0">
                                    <div class="col-auto card-icon-aside bg-secondary"><i class="me-1 text-white-50 fab fa-bootstrap"></i></div>
                                    <div class="col">
                                        <div class="card-body py-5">
                                            <h5 class="card-title">Bootstrap Documentation Available</h5>
                                            <p class="card-text">Modals are a default component included with the Bootstrap framework. For more information on implementing, modifying, and extending the usage of modals within your project, visit the official Bootstrap modal documentation page.</p>
                                            <a class="btn btn-secondary btn-sm" href="https://getbootstrap.com/docs/4.4/components/modal/" target="_blank">
                                                <i class="me-1" data-feather="external-link"></i>
                                                Visit Bootstrap Modal Docs
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Sticky Navigation-->
                        <div class="col-lg-3">
                            <div class="nav-sticky">
                                <div class="card">
                                    <div class="card-body">
                                        <ul class="nav flex-column" id="stickyNav">
                                            <li class="nav-item"><a class="nav-link" href="#default">Default</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#scrollable">Scrollable</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#centered">Vertically Centered</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#sizing">Sizing</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="footer-admin mt-auto footer-light">
                <?php include "eP_footer.html"; ?>

            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.17.1/components/prism-core.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.17.1/plugins/autoloader/prism-autoloader.min.js" crossorigin="anonymous"></script>
</body>

</html>