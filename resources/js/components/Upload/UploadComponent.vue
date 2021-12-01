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
                    <div class="flex items-center justify-center w-full" @dragover.prevent @drop.prevent>
                         <label class="flex flex-col rounded-lg border-4 border-dashed w-full h-60 p-10 group text-center">
                            <div class="h-full w-full text-center flex flex-col items-center justify-center items-center  ">
                                <div class="flex flex-auto max-h-48 w-2/5 mx-auto -mt-10">
                                <img class="has-mask h-36 object-center" src="https://img.freepik.com/free-vector/image-upload-concept-landing-page_52683-27130.jpg?size=338&ext=jpg" alt="freepik image">
                                </div>
                                <p class="pointer-none text-gray-500 "><span class="text-sm">Drag and drop</span> files here <br /> or <a @click="this.$refs.file.click()" class="text-blue-600 hover:underline">select a file</a> from your computer</p>
                            </div>
                            <input ref="file" type="file" class="hidden" accept=".xls, .xlsx" @change="uploadDocument">
                        </label>
                    </div>
                    <div class="w-full border-2 border-gray-100" v-if="File">
                        <li class="block p-1 w-1/2 h-24">
                            <article tabindex="0" class="group w-full h-full rounded-md focus:outline-none focus:shadow-outline elative bg-gray-100 cursor-pointer relative shadow-sm">
                            <img alt="upload preview" class="img-preview hidden w-full h-full sticky object-cover rounded-md bg-fixed" />

                            <section class="flex flex-col rounded-md text-xs break-words w-full h-full z-20 absolute top-0 py-2 px-3">
                                <h1 class="flex-1 group-hover:text-blue-800"></h1>
                                <div class="flex">
                                <span class="p-1 text-blue-800">
                                    <i>
                                    <svg class="fill-current w-4 h-4 ml-auto pt-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path d="M15 2v5h5v15h-16v-20h11zm1-2h-14v24h20v-18l-6-6z" />
                                    </svg>
                                    </i>
                                </span>
                                <p class="p-1 size text-xs text-gray-700">{{File.name}}</p>
                                <button class="delete ml-auto focus:outline-none hover:bg-gray-300 p-1 rounded-md text-gray-800">
                                    <svg class="pointer-events-none fill-current w-4 h-4 ml-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path class="pointer-events-none" d="M3 6l3 18h12l3-18h-18zm19-4v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.316c0 .901.73 2 1.631 2h5.711z" />
                                    </svg>
                                </button>
                                </div>
                            </section>
                            </article>
                        </li>
                    </div>
                </div>
                <p class="text-sm text-gray-300">
                    <span>File type: xlsx</span>
                </p>
                <div>
                    <button @click="submit" class="py-2 px-4  bg-purple-600 hover:bg-purple-700 focus:ring-purple-500 focus:ring-offset-purple-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                    Upload
                </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import { mapActions, mapState } from 'vuex';
export default {
    data(){
        return {
            title: '',
            File: ''
        }
    },

    computed: {
        ...mapState(['user'])
    },

    methods: {
        ...mapActions(['upload']),

        dragFile(e) {
            this.File = e.dataTransfer.files;
        },
        uploadDocument(e){
            // Check file size, chunk uplaods 
            this.File = e.target.files[0];

            console.log(this.File)
        },

        submit(e){

            e.preventDefault()
            // Build formdata
            let formdata = new FormData()

            // Append title
            formdata.append('title', this.title)

            // 
            formdata.append('user_id', this.user.id)

            formdata.append('excel', this.File)

            this.upload(formdata).then(response=>{
                alert("success")
            }).catch(error=>{
                alert("Error")
            })

        }
    }
}
</script>
