<template>
    <div class="bg-white dark:bg-gray-800 flex relative z-20 items-center overflow-hidden">
        <div class="container mx-auto px-6 flex relative py-16">
            <div class="sm:w-2/3 lg:w-2/5 flex flex-col relative z-20">
                <span class="w-20 h-2 bg-gray-800 dark:bg-white mb-12">
                </span>
                <h1 class="font-bebas-neue uppercase text-6xl sm:text-8xl font-black flex flex-col leading-none dark:text-white text-gray-800">
                    Excel files
                    <span class="text-5xl sm:text-7xl">
                        Simplified
                    </span>
                </h1>
                <p class="text-base sm:text-lg text-gray-700 dark:text-white">
                   Register, Login, Upload your document and navigate to All Uploads to view the upload
                </p>
                <div class="flex mt-8">
                    <router-link to="/register" class="uppercase py-2 px-4 rounded-lg bg-purple-600  border-2 border-transparent text-white text-md mr-4 hover:bg-purple-700" >
                        Register
                    </router-link>
                    <router-link to="/login" class="uppercase py-2 px-4 rounded-lg bg-transparent border-2 border-purple-600 text-purple-600 dark:text-white hover:bg-purple-600 hover:text-white text-md" >
                        Login
                    </router-link>
                    
                   
                </div>
            </div>
            <div class="hidden sm:block sm:w-1/3 lg:w-3/5 relative">
                <!-- <img src="/images/object/10.png" class="max-w-xs md:max-w-sm m-auto"/> -->
            </div>
        </div>
    </div>
</template>

<script>
export default {
    
}
</script>