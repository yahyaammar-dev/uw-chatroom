<div class="profile max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!--card-->
        <div class="card bg-white flex flex-col items-center justify-center p-4 shadow-lg rounded-2xl w-64 mx-auto sm:mx-0">
            <!--profile-image-->
            <div class="profile mx-auto rounded-full py-2 w-16 "> 
                <?php $pic = Auth::user()->profilepic; ?>
                <img src="{{ Storage::url($pic) }}" alt="profile">
            </div>
            <!--name-->
            <div class="name text-gray-800 text-2xl font-medium mt-4 ">
                <p>{{Auth::user()->name;}}</p>
            </div>
            <!--username-->
            <div class="username text-gray-500">
                <p>{{strstr(Auth::user()->email,'@',true);}}</p>
            </div>
            <!--work-->
            <div class="work text-gray-700 mt-4">
                <p>{{Auth::user()->about;}}</p>
            </div>
            <!-- follow button -->
            <!-- <div class="w-full mt-8">
                <button class="bg-blue-500 py-2 px-4 hover:bg-blue-600 text-white w-full font-semibold rounded-lg shadow-lg">
                    Follow
                </button>
            </div> -->
        </div>
    <!-- Do what you can, with what you have, where you are. - Theodore Roosevelt -->
</div>