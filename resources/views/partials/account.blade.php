<div class="mt-8">
    <div class="d-flex align-items-center mb-4 px-6">
        <small class="text-muted me-auto">Account</small>
    </div>

    <div class="card border-0">
        <div class="card-body py-2">
            <!-- Accordion -->
            <div class="accordion accordion-flush" id="accordion-profile">
                <div class="accordion-item">
                    <div class="accordion-header" id="accordion-profile-1">
                        <a href="#" class="accordion-button text-reset collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-profile-body-1" aria-expanded="false" aria-controls="accordion-profile-body-1">
                            <div>
                                <h5>Profile settings</h5>
                                <p>Change your profile settings</p>
                            </div>
                        </a>
                    </div>

                    <div id="accordion-profile-body-1" class="accordion-collapse collapse" aria-labelledby="accordion-profile-1" data-parent="#accordion-profile">
                        <div class="accordion-body">
                            <form action="{{route('account.update')}}" method="post">
                                @csrf
                            <div class="form-floating mb-6">
                                <input type="text" name="name" class="form-control" id="profile-name" placeholder="Name">
                                <label for="profile-name">Name</label>
                            </div>

                            <div class="form-floating mb-6">
                                <input type="email" name="email" class="form-control" id="profile-email" placeholder="Email address">
                                <label for="profile-email">Email</label>
                            </div>

                            <div class="form-floating mb-6">
                                <input type="text" name="phone" class="form-control" id="profile-phone" placeholder="Phone">
                                <label for="profile-phone">Phone</label>
                            </div>


                            <button type="submit" class="btn btn-block btn-lg btn-primary w-100">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
         @include('partials.connected-account')

            </div>
        </div>
    </div>
</div>
