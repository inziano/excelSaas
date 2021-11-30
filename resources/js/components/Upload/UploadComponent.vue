<template>
    <div class="mx-auto flex flex-col max-w-xl px-4 py-8 bg-white rounded-lg shadow dark:bg-gray-800 sm:px-6 md:px-8 lg:px-10">
        <div class="sm:max-w-lg w-full p-10 bg-white rounded-xl z-10">
            <div class="self-center mb-2 text-xl font-light text-gray-800 sm:text-2xl dark:text-white">
                Upload Your File
            </div>
            <form class="mt-8 space-y-3" >
                <div class="grid grid-cols-1 space-y-2">
                    <label class="text-sm font-bold text-gray-500 tracking-wide">Title</label>
                        <input v-model="title" class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500" type="" placeholder="Title">
                </div>
                <div class="grid grid-cols-1 space-y-2">
                    <label class="text-sm font-bold text-gray-500 tracking-wide">Attach Document</label>
                    <div class="flex items-center justify-center w-full">
                        <label class="flex flex-col rounded-lg border-4 border-dashed w-full h-60 p-10 group text-center">
                            <div class="h-full w-full text-center flex flex-col items-center justify-center items-center  ">
                               
                                <div class="flex flex-auto max-h-48 w-2/5 mx-auto -mt-10">
                                <img class="has-mask h-36 object-center" src="https://img.freepik.com/free-vector/image-upload-concept-landing-page_52683-27130.jpg?size=338&ext=jpg" alt="freepik image">
                                </div>
                                <p class="pointer-none text-gray-500 "><span class="text-sm">Drag and drop</span> files here <br /> </p>
                            </div>
                            <input type="file" class="opacity-0" accept=".xls, .xlsx" onchange="uploadDocument(this)">
                        </label>
                    </div>
                </div>
                <p class="text-sm text-gray-300">
                    <span>File type: xlsx</span>
                </p>
                <div>
                    <button type="submit" class="py-2 px-4  bg-purple-600 hover:bg-purple-700 focus:ring-purple-500 focus:ring-offset-purple-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                    Upload
                </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            title: ''
        }
    },

    methods: {
        uploadDocument(e){
            // Check file size, chun 
            this.$emit('input', e.target.files[0])this.file = e.files[0]
            
        }
    }
}
</script>
