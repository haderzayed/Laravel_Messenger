
<div class="mt-8">
    <div class="d-flex align-items-center my-4 px-6">
        <small class="text-muted me-auto">Security</small>
    </div>

    <div class="card border-0">
        <div class="card-body py-2">
            <!-- Accordion -->
            <div class="accordion accordion-flush" id="accordion-security">
                <div class="accordion-item">
                    <div class="accordion-header" id="accordion-security-1">
                        <a href="#" class="accordion-button text-reset collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-security-body-1" aria-expanded="false" aria-controls="accordion-security-body-1">
                            <div>
                                <h5>Password</h5>
                                <p>Change your password</p>
                            </div>
                        </a>
                    </div>

                    <div id="accordion-security-body-1" class="accordion-collapse collapse" aria-labelledby="accordion-security-1" data-parent="#accordion-security">
                        <div class="accordion-body">
                            <form action="{{route('change.password')}}" method="post" autocomplete="on">
                                @csrf
                                <div class="form-floating mb-6">
                                    <input type="password" name="current_password" class="form-control" id="profile-current-password" placeholder="Current Password" autocomplete="">
                                    <label for="profile-current-password">Current Password</label>
                                    @error("current_password")
                                    <span class="text-danger">  {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-floating mb-6">
                                    <input type="password" name="password" class="form-control" id="password" placeholder="New password" autocomplete="">
                                    <label for="password">New password</label>
                                    @error("password")
                                    <span class="text-danger">  {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-floating mb-6">
                                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation-verify-password" placeholder="Verify Password" >
                                    <label for="profile-verify-password_confirmation">Verify Password</label>
                                    @error("password_confirmation")
                                    <span class="text-danger">  {{ $message }}</span>
                                    @enderror
                                </div>

                            <button type="submit" class="btn btn-block btn-lg btn-primary w-100">Save</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Switch -->
{{--                <div class="accordion-item">--}}
{{--                    <div class="accordion-header">--}}
{{--                        <div class="row align-items-center">--}}
{{--                            <div class="col">--}}
{{--                                <h5>Two-step verifications</h5>--}}
{{--                                <p>Enable two-step verifications</p>--}}
{{--                            </div>--}}
{{--                            <div class="col-auto">--}}
{{--                                <div class="form-check form-switch">--}}
{{--                                    <input class="form-check-input" type="checkbox" id="accordion-security-check-1">--}}
{{--                                    <label class="form-check-label" for="accordion-security-check-1"></label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
</div>

