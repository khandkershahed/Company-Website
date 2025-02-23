<x-admin-app-layout :title="'Contact Message Edit'">
    <div class="card card-flush w-lg-75 m-auto">
        <div class="card-header bg-info align-items-center">

            <h2 class="card-title text-white">Edit Contact Form</h2>
            {{-- <div>
                <a class="btn btn-sm btn-light-primary rounded-0" href="{{ route('admin.contact.create') }}">
                    Add New
                </a>
            </div> --}}
        </div>
        <div class="card-body table-responsive">
            <form method="post" action="{{ route('contact.update', $contact->id) }}">
                @csrf
                @method('PUT')
                <!--Banner Section-->
                <div class="container">
                    <div class="row mb-1 g-2 p-1">
                        <div class="col">
                            <div class="px-2 py-2 rounded bg-light mt-2">
                                {{--  --}}
                                <div class="row mb-1">
                                    <div class="col-lg-4 col-sm-12">
                                        <span>First Name</span>
                                    </div>
                                    <div class="col-lg-8 col-sm-12">
                                        <input type="text" name="fname" value="{{ $contact->fname }}"
                                            class="form-control form-control-sm" maxlength="100" required />
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row mb-1">
                                    <div class="col-lg-4 col-sm-12">
                                        <span>Last Name </span>
                                    </div>
                                    <div class="col-lg-8 col-sm-12">
                                        <input type="text" name="lname" value="{{ $contact->lname }}"
                                            class="form-control form-control-sm" maxlength="100" required />
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row mb-1">
                                    <div class="col-lg-4 col-sm-12">
                                        <span>Phone</span>
                                    </div>
                                    <div class="col-lg-8 col-sm-12">
                                        <input type="text" name="phone" value="{{ $contact->phone }}"
                                            class="form-control form-control-sm" maxlength="100" required />
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row mb-1">
                                    <div class="col-lg-4 col-sm-12">
                                        <span>State</span>
                                    </div>
                                    <div class="col-lg-8 col-sm-12">
                                        <input type="text" name="state" value="{{ $contact->state }}"
                                            class="form-control form-control-sm" maxlength="100" required />
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row mb-1">
                                    <div class="col-lg-4 col-sm-12">
                                        <span>Country</span>
                                    </div>
                                    <div class="col-lg-8 col-sm-12">
                                        <input type="text" name="country" value="{{ $contact->country }}"
                                            class="form-control form-control-sm" maxlength="100" required />
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row mb-1">
                                    <div class="col-lg-4 col-sm-12">
                                        <span>Email</span>
                                    </div>
                                    <div class="col-lg-8 col-sm-12">
                                        <input type="email" name="email" value="{{ $contact->email }}"
                                            class="form-control form-control-sm" maxlength="100" required />
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row mb-1">
                                    <div class="col-lg-4 col-sm-12">
                                        <span>Message Type</span>
                                    </div>
                                    <div class="col-lg-8 col-sm-12">
                                        <select name="msg_type" value="{{ $contact->msg_type }}"
                                            class="form-control select" data-placeholder="Chose msg_type ">
                                            <option value="Account creation problem">Account creation problem
                                            </option>
                                            <option value="Cannot login">Cannot login</option>
                                            <option value="Client feedback entry">Client feedback entry</option>
                                            <option value="General web issue">General web issue</option>
                                            <option value="Order return request">Order return request</option>
                                            <option value="Order tracking/history">Order tracking/history</option>
                                            <option value="Product information request">Product information request
                                            </option>
                                            <option value="Update my account/email information">Update my
                                                account/email information</option>
                                        </select>
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row mb-1">
                                    <div class="col-lg-4 col-sm-12">
                                        <span>Message</span>
                                    </div>
                                    <div class="col-lg-8 col-sm-12">
                                        <textarea name="message" value="{{ $contact->message }}" id="" class="form-control" cols="30"
                                            rows="2"></textarea>
                                    </div>
                                </div>
                                {{--  --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col d-flex justify-content-end mb-2 mx-2">
                        <button type="submit" class="submit_btn from-prevent-multiple-submits"
                            style="padding: 4px 9px;">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-admin-app-layout>
