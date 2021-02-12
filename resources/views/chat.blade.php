@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/chat.css') }}">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="my-card">
                    <div class="my-card-title">Chats</div>

                    <div class="my-card-body" id="container-body">
                        <chat-messages :messages="messages" v-on:deletemsg="deleteMessage"></chat-messages>
                    </div>
                    <div class="my-card-footer">
                        <chat-form v-on:messagesent="addMessage" :user="{{ Auth::user() }}"></chat-form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
