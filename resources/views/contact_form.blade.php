@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4>Support Contact Form</h4>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('contact.submit') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required autocomplete="off">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" required autocomplete="off">
                        </div>

                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" class="form-control" id="subject" name="subject" required autocomplete="off">
                        </div>

                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="message" class="form-label">Ticket Type</label>
                            <select class="form-control" id="type" name="type" required>
                                <option value="technical">Technical Issues</option>
                                <option value="billing">Account & Billing</option>
                                <option value="product">Product & Service</option>
                                <option value="general">General Inquiry</option>
                                <option value="feedback">Feedback & Suggestions</option>
                            </select>
                        </div>

                        

                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
