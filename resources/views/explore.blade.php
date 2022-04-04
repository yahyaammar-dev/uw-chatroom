<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="max-w-7xl mx-auto py-12">

        <div class="flex justify-center flex-wrap">
            @foreach($users as $user)

            <div class="profile max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4 2xl:mb-0">
                <!--card-->
                <div class="card bg-white flex flex-col items-center justify-center p-4 shadow-lg rounded-2xl w-64 mx-auto sm:mx-0">
                    <!--ID-->
                    <div class="useridwrapper mx-auto rounded-full py-2 w-16 "> 
                        <p class="userid">{{$user->id;}}</p>
                    </div>
                    <!--profile-image-->
                    <div class="profile mx-auto rounded-full py-2 w-16 "> 
                        <img src="{{ Storage::url($user->profilepic) }}" alt="profile">
                    </div>
                    <!--name-->
                    <div class="name text-gray-800 text-2xl font-medium mt-4 ">
                        <p>{{$user->name;}}</p>
                    </div>
                    <!--username-->
                    <div class="username text-gray-500">
                        <p>{{strstr($user->email,'@',true);}}</p>
                    </div>
                    <!--work-->
                    <div class="work text-gray-700 mt-4">
                        <p>{{$user->about;}}</p>
                    </div>
                    <!-- follow button -->
                    <div class="w-full mt-8">
                        <button class="messagebutton bg-blue-500 py-2 px-4 hover:bg-blue-600 text-white w-full font-semibold rounded-lg shadow-lg">
                            Message
                        </button>
                    </div>
                </div>
            </div>

            @endforeach

        </div>

    </div>
  
</x-app-layout>


<form method="post" action="chat" class="nextpageform hidden">
    @csrf
    <input type="text" name="id" class="inputid"/>
    <input type="submit" />
</form>


<script>
    $(document).ready(function(){
        $(".messagebutton").on('click',function(){
            par = ($(this)).parent().parent().find('.userid').text();
            console.log( par )
            $(".inputid").val(par);
           $(".nextpageform").submit();
        })
    })    
</script>