<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Chat') }}
        </h2>
        <input type="text" placeholder="Enter username" value="{{Auth::user()->name}}" class="hidden" id="username_input"/>
    </x-slot>

    <div class="sm:w-1/2 w-full  mx-auto bg-white p-4">

        <div class="chatarea messages_el">
           
        </div>

        <form class="flex justify-center mt-4" id="message_form">
            <input type="text" placeholder="Type your message here" id="message_input" class="input input-bordered h-8 w-full">
            <button type="submit" class="bg-gray-300">     
                <div class="flex flex-col justify-center w-6 items-center">
                    <i class="fa-solid fa-arrow-up "></i>
                </div>
            </button>
        </form>
    </div>



</x-app-layout>

<script>
        

    const messages_el = document.querySelector(".chatarea")
    const username_input = document.getElementById("username_input") 
    const message_input = document.getElementById('message_input')
    const message_form = document.getElementById('message_form')



    message_form.addEventListener('submit',function(e){
        e.preventDefault();


        let has_error = false;

        if(username_input.value==''){
            alert("Please Enter a user name")
            has_error = true;
        }
        if(message_input.value == ''){
            alert("Pleasae Enter a message")
            has_error = true;
        }
        if(has_error==true){
            return;
        }

        const options = {
            method: 'post',
            url: '/sendmessage',
            data: {
                username: username_input.value,
                message:  message_input.value
            }
        }

        axios(options);

    });

    window.Echo.channel('chat').listen('.message',function(e){
            messages_el.innerHTML +=  '<div class="message bg-blue-100 inline-block py-1 px-3"> <b>' + e.message  +':</b>' + e.username + '</div> <br />';
    });
</script>