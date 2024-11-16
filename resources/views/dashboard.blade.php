@extends('layouts.index')


@section('content')
    <div class="py-12 h-[100vh] ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="p-6 text-gray-900 dark:text-gray-100">
                <nav
                    class="w-[20rem] absolute top-[10rem] left-10 flex justify-center items-center flex-col rounded-lg h-[40rem] bg-gradient-to-b from-black to-[#00e0d4] text-white shadow-lg">
                    @if (Auth::user()->role == 'admin')
                        <img class="h-[70px] w-[70px] border-white border-2 absolute top-10 mb-5 rounded-full object-cover"
                            src="{{ Auth::user()->image }}" alt="">
                    @else
                        <img class="h-[70px] w-[70px] border-white border-2 object-cover absolute top-10 mb-5 rounded-full"
                            src="{{ asset('storage/images/' . Auth::user()->image) }}" alt="">
                    @endif
                    <a class="w-full h-[5rem] smooths  hover:bg-[#1e1e1e] custom-rounded flex justify-center items-center"
                        href="/dashboard">Home</a>
                    @if (Auth::user()->role == 'admin')
                        <a class="w-full h-[5rem] smooths  hover:bg-[#1e1e1e] custom-rounded flex justify-center items-center"
                            href="/admin">Admin Section</a>
                    @endif
                    <a class="w-full h-[5rem] smooths  hover:bg-[#1e1e1e] custom-rounded flex justify-center items-center"
                        href="/trainers">Trainers</a>

                    <a class="w-full h-[5rem] smooths  hover:bg-[#1e1e1e] custom-rounded flex justify-center items-center"
                        href="{{ route('profile.edit') }}">Setting</a>

                    <form class="w-full" method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="w-full smooths h-[5rem]  hover:bg-[#1e1e1e] custom-rounded flex justify-center items-center cursor-pointer"
                            :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </a>
                    </form>
                </nav>


            </div>

        </div>
    </div>
@endsection
