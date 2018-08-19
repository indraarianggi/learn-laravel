@extends('main')

@section('title', 'Contact')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1>Contact Me</h1>
            <hr>
            <form action="#" method="post">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" class="form-control">
                </div>

                <div class="form-group">
                    <label for="subject">Subject:</label>
                    <input type="text" id="subject" class="form-control">
                </div>

                <div class="form-group">
                    <label for="email">Message:</label>
                    <textarea name="message" id="message" class="form-control">Type your message here...</textarea>
                </div>

                <input type="submit" value="Send Message" class="btn btn-success">
            </form>
        </div>
    </div>

@endsection
