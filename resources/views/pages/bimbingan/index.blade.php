@extends('layout.main')

@section('content')
<div class="page-header no-gutters">
    <div class="row align-items-md-center">
        <div class="col-md-6">
            <div class="media m-v-10">
                <div class="avatar avatar-cyan avatar-icon avatar-square">
                    <i class="anticon anticon-star"></i>
                </div>
                <div class="media-body m-l-15">
                    <h6 class="mb-0">All Members (9)</h6>
                    <span class="text-gray font-size-13">Dev Team</span>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="text-md-right m-v-10">
                <div class="btn-group">
                    <button id="list-view-btn" type="button" class="btn btn-default btn-icon">
                        <i class="anticon anticon-ordered-list"></i>
                    </button>
                    <button id="card-view-btn" type="button" class="btn btn-default btn-icon active">
                        <i class="anticon anticon-appstore"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-11 mx-auto">
        <!-- Card View -->
        <div class="row" id="card-view">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="m-t-20 text-center">
                            <div class="avatar avatar-image" style="height: 100px; width: 100px;">
                                <img src="assets/images/avatars/thumb-1.jpg" alt="">
                            </div>
                            <h4 class="m-t-30">Erin Gonzales</h4>
                            <p>erin.gon@gmail.com</p>
                        </div>
                        <div class="text-center m-t-15">
                            <button class="m-r-5 btn btn-icon btn-hover btn-rounded">
                                <i class="anticon anticon-facebook"></i>
                            </button>
                            <button class="m-r-5 btn btn-icon btn-hover btn-rounded">
                                <i class="anticon anticon-twitter"></i>
                            </button>
                            <button class="m-r-5 btn btn-icon btn-hover btn-rounded">
                                <i class="anticon anticon-instagram"></i>
                            </button>
                        </div>
                        <div class="text-center m-t-30">
                            <a href="profile.html" class="btn btn-primary btn-tone">
                                <i class="anticon anticon-mail"></i>
                                <span class="m-l-5">Contact</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="m-t-20 text-center">
                            <div class="avatar avatar-image" style="height: 100px; width: 100px;">
                                <img src="assets/images/avatars/thumb-2.jpg" alt="">
                            </div>
                            <h4 class="m-t-30">Darryl Day</h4>
                            <p>darryl.d@gmail.com</p>
                        </div>
                        <div class="text-center m-t-15">
                            <button class="m-r-5 btn btn-icon btn-hover btn-rounded">
                                <i class="anticon anticon-facebook"></i>
                            </button>
                            <button class="m-r-5 btn btn-icon btn-hover btn-rounded">
                                <i class="anticon anticon-twitter"></i>
                            </button>
                            <button class="m-r-5 btn btn-icon btn-hover btn-rounded">
                                <i class="anticon anticon-instagram"></i>
                            </button>
                        </div>
                        <div class="text-center m-t-30">
                            <a href="profile.html" class="btn btn-primary btn-tone">
                                <i class="anticon anticon-mail"></i>
                                <span class="m-l-5">Contact</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="m-t-20 text-center">
                            <div class="avatar avatar-image" style="height: 100px; width: 100px;">
                                <img src="assets/images/avatars/thumb-3.jpg" alt="">
                            </div>
                            <h4 class="m-t-30">Marshall Nichols</h4>
                            <p>marshalln@gmail.com</p>
                        </div>
                        <div class="text-center m-t-15">
                            <button class="m-r-5 btn btn-icon btn-hover btn-rounded">
                                <i class="anticon anticon-facebook"></i>
                            </button>
                            <button class="m-r-5 btn btn-icon btn-hover btn-rounded">
                                <i class="anticon anticon-twitter"></i>
                            </button>
                            <button class="m-r-5 btn btn-icon btn-hover btn-rounded">
                                <i class="anticon anticon-instagram"></i>
                            </button>
                        </div>
                        <div class="text-center m-t-30">
                            <a href="profile.html" class="btn btn-primary btn-tone">
                                <i class="anticon anticon-mail"></i>
                                <span class="m-l-5">Contact</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="m-t-20 text-center">
                            <div class="avatar avatar-image" style="height: 100px; width: 100px;">
                                <img src="assets/images/avatars/thumb-4.jpg" alt="">
                            </div>
                            <h4 class="m-t-30">Virgil Gonzales</h4>
                            <p>virgil14@gmail.com</p>
                        </div>
                        <div class="text-center m-t-15">
                            <button class="m-r-5 btn btn-icon btn-hover btn-rounded">
                                <i class="anticon anticon-facebook"></i>
                            </button>
                            <button class="m-r-5 btn btn-icon btn-hover btn-rounded">
                                <i class="anticon anticon-twitter"></i>
                            </button>
                            <button class="m-r-5 btn btn-icon btn-hover btn-rounded">
                                <i class="anticon anticon-instagram"></i>
                            </button>
                        </div>
                        <div class="text-center m-t-30">
                            <a href="profile.html" class="btn btn-primary btn-tone">
                                <i class="anticon anticon-mail"></i>
                                <span class="m-l-5">Contact</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="m-t-20 text-center">
                            <div class="avatar avatar-image" style="height: 100px; width: 100px;">
                                <img src="assets/images/avatars/thumb-5.jpg" alt="">
                            </div>
                            <h4 class="m-t-30">Nicole Wyne</h4>
                            <p>nicolew@gmail.com</p>
                        </div>
                        <div class="text-center m-t-15">
                            <button class="m-r-5 btn btn-icon btn-hover btn-rounded">
                                <i class="anticon anticon-facebook"></i>
                            </button>
                            <button class="m-r-5 btn btn-icon btn-hover btn-rounded">
                                <i class="anticon anticon-twitter"></i>
                            </button>
                            <button class="m-r-5 btn btn-icon btn-hover btn-rounded">
                                <i class="anticon anticon-instagram"></i>
                            </button>
                        </div>
                        <div class="text-center m-t-30">
                            <a href="profile.html" class="btn btn-primary btn-tone">
                                <i class="anticon anticon-mail"></i>
                                <span class="m-l-5">Contact</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="m-t-20 text-center">
                            <div class="avatar avatar-image" style="height: 100px; width: 100px;">
                                <img src="assets/images/avatars/thumb-6.jpg" alt="">
                            </div>
                            <h4 class="m-t-30">Riley Newman</h4>
                            <p>rileyn93@gmail.com</p>
                        </div>
                        <div class="text-center m-t-15">
                            <button class="m-r-5 btn btn-icon btn-hover btn-rounded">
                                <i class="anticon anticon-facebook"></i>
                            </button>
                            <button class="m-r-5 btn btn-icon btn-hover btn-rounded">
                                <i class="anticon anticon-twitter"></i>
                            </button>
                            <button class="m-r-5 btn btn-icon btn-hover btn-rounded">
                                <i class="anticon anticon-instagram"></i>
                            </button>
                        </div>
                        <div class="text-center m-t-30">
                            <a href="profile.html" class="btn btn-primary btn-tone">
                                <i class="anticon anticon-mail"></i>
                                <span class="m-l-5">Contact</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="m-t-20 text-center">
                            <div class="avatar avatar-image" style="height: 100px; width: 100px;">
                                <img src="assets/images/avatars/thumb-7.jpg" alt="">
                            </div>
                            <h4 class="m-t-30">Pamela Wanda</h4>
                            <p>pamelaw@gmail.com</p>
                        </div>
                        <div class="text-center m-t-15">
                            <button class="m-r-5 btn btn-icon btn-hover btn-rounded">
                                <i class="anticon anticon-facebook"></i>
                            </button>
                            <button class="m-r-5 btn btn-icon btn-hover btn-rounded">
                                <i class="anticon anticon-twitter"></i>
                            </button>
                            <button class="m-r-5 btn btn-icon btn-hover btn-rounded">
                                <i class="anticon anticon-instagram"></i>
                            </button>
                        </div>
                        <div class="text-center m-t-30">
                            <a href="profile.html" class="btn btn-primary btn-tone">
                                <i class="anticon anticon-mail"></i>
                                <span class="m-l-5">Contact</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-none" id="list-view">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Social</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="media align-items-center">
                                                    <div class="avatar avatar-image">
                                                        <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                                    </div>
                                                    <div class="media-body m-l-15">
                                                        <h6 class="mb-0">Erin Gonzales</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>erin.gon@gmail.com</td>
                                            <td>
                                                <button class="m-r-5 btn btn-icon btn-hover btn-rounded">
                                                    <i class="anticon anticon-facebook"></i>
                                                </button>
                                                <button class="m-r-5 btn btn-icon btn-hover btn-rounded">
                                                    <i class="anticon anticon-twitter"></i>
                                                </button>
                                                <button class="m-r-5 btn btn-icon btn-hover btn-rounded">
                                                    <i class="anticon anticon-instagram"></i>
                                                </button>
                                            </td>
                                            <td class="text-right">
                                                <a href="profile.html" class="btn btn-primary btn-tone">
                                                    <i class="anticon anticon-mail"></i>
                                                    <span class="m-l-5">Contact</span>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="media align-items-center">
                                                    <div class="avatar avatar-image">
                                                        <img src="assets/images/avatars/thumb-2.jpg" alt="">
                                                    </div>
                                                    <div class="media-body m-l-15">
                                                        <h6 class="mb-0">Darryl Day</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>darryl.d@gmail.com</td>
                                            <td>
                                                <button class="m-r-5 btn btn-icon btn-hover btn-rounded">
                                                    <i class="anticon anticon-facebook"></i>
                                                </button>
                                                <button class="m-r-5 btn btn-icon btn-hover btn-rounded">
                                                    <i class="anticon anticon-twitter"></i>
                                                </button>
                                                <button class="m-r-5 btn btn-icon btn-hover btn-rounded">
                                                    <i class="anticon anticon-instagram"></i>
                                                </button>
                                            </td>
                                            <td class="text-right">
                                                <a href="profile.html" class="btn btn-primary btn-tone">
                                                    <i class="anticon anticon-mail"></i>
                                                    <span class="m-l-5">Contact</span>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="media align-items-center">
                                                    <div class="avatar avatar-image">
                                                        <img src="assets/images/avatars/thumb-3.jpg" alt="">
                                                    </div>
                                                    <div class="media-body m-l-15">
                                                        <h6 class="mb-0">Marshall Nichols</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>marshalln@gmail.com</td>
                                            <td>
                                                <button class="m-r-5 btn btn-icon btn-hover btn-rounded">
                                                    <i class="anticon anticon-facebook"></i>
                                                </button>
                                                <button class="m-r-5 btn btn-icon btn-hover btn-rounded">
                                                    <i class="anticon anticon-twitter"></i>
                                                </button>
                                                <button class="m-r-5 btn btn-icon btn-hover btn-rounded">
                                                    <i class="anticon anticon-instagram"></i>
                                                </button>
                                            </td>
                                            <td class="text-right">
                                                <a href="profile.html" class="btn btn-primary btn-tone">
                                                    <i class="anticon anticon-mail"></i>
                                                    <span class="m-l-5">Contact</span>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="media align-items-center">
                                                    <div class="avatar avatar-image">
                                                        <img src="assets/images/avatars/thumb-4.jpg" alt="">
                                                    </div>
                                                    <div class="media-body m-l-15">
                                                        <h6 class="mb-0">Virgil Gonzales</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>virgil14@gmail.com</td>
                                            <td>
                                                <button class="m-r-5 btn btn-icon btn-hover btn-rounded">
                                                    <i class="anticon anticon-facebook"></i>
                                                </button>
                                                <button class="m-r-5 btn btn-icon btn-hover btn-rounded">
                                                    <i class="anticon anticon-twitter"></i>
                                                </button>
                                                <button class="m-r-5 btn btn-icon btn-hover btn-rounded">
                                                    <i class="anticon anticon-instagram"></i>
                                                </button>
                                            </td>
                                            <td class="text-right">
                                                <a href="profile.html" class="btn btn-primary btn-tone">
                                                    <i class="anticon anticon-mail"></i>
                                                    <span class="m-l-5">Contact</span>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="media align-items-center">
                                                    <div class="avatar avatar-image">
                                                        <img src="assets/images/avatars/thumb-5.jpg" alt="">
                                                    </div>
                                                    <div class="media-body m-l-15">
                                                        <h6 class="mb-0">Nicole Wyne</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>nicolew@gmail.com</td>
                                            <td>
                                                <button class="m-r-5 btn btn-icon btn-hover btn-rounded">
                                                    <i class="anticon anticon-facebook"></i>
                                                </button>
                                                <button class="m-r-5 btn btn-icon btn-hover btn-rounded">
                                                    <i class="anticon anticon-twitter"></i>
                                                </button>
                                                <button class="m-r-5 btn btn-icon btn-hover btn-rounded">
                                                    <i class="anticon anticon-instagram"></i>
                                                </button>
                                            </td>
                                            <td class="text-right">
                                                <a href="profile.html" class="btn btn-primary btn-tone">
                                                    <i class="anticon anticon-mail"></i>
                                                    <span class="m-l-5">Contact</span>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="media align-items-center">
                                                    <div class="avatar avatar-image">
                                                        <img src="assets/images/avatars/thumb-6.jpg" alt="">
                                                    </div>
                                                    <div class="media-body m-l-15">
                                                        <h6 class="mb-0">Riley Newman</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>rileyn93@gmail.com</td>
                                            <td>
                                                <button class="m-r-5 btn btn-icon btn-hover btn-rounded">
                                                    <i class="anticon anticon-facebook"></i>
                                                </button>
                                                <button class="m-r-5 btn btn-icon btn-hover btn-rounded">
                                                    <i class="anticon anticon-twitter"></i>
                                                </button>
                                                <button class="m-r-5 btn btn-icon btn-hover btn-rounded">
                                                    <i class="anticon anticon-instagram"></i>
                                                </button>
                                            </td>
                                            <td class="text-right">
                                                <a href="profile.html" class="btn btn-primary btn-tone">
                                                    <i class="anticon anticon-mail"></i>
                                                    <span class="m-l-5">Contact</span>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="media align-items-center">
                                                    <div class="avatar avatar-image">
                                                        <img src="assets/images/avatars/thumb-7.jpg" alt="">
                                                    </div>
                                                    <div class="media-body m-l-15">
                                                        <h6 class="mb-0">Pamela Wanda</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>pamelaw@gmail.com</td>
                                            <td>
                                                <button class="m-r-5 btn btn-icon btn-hover btn-rounded">
                                                    <i class="anticon anticon-facebook"></i>
                                                </button>
                                                <button class="m-r-5 btn btn-icon btn-hover btn-rounded">
                                                    <i class="anticon anticon-twitter"></i>
                                                </button>
                                                <button class="m-r-5 btn btn-icon btn-hover btn-rounded">
                                                    <i class="anticon anticon-instagram"></i>
                                                </button>
                                            </td>
                                            <td class="text-right">
                                                <a href="profile.html" class="btn btn-primary btn-tone">
                                                    <i class="anticon anticon-mail"></i>
                                                    <span class="m-l-5">Contact</span>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
