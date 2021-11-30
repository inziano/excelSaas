<template>
    <div class="w-full">        
       
        <div class="mx-auto flex flex-col max-w-md px-4 py-8 bg-white rounded-lg shadow dark:bg-gray-800 sm:px-6 md:px-8 lg:px-10">
            <div class="self-center mb-2 text-xl font-light text-gray-800 sm:text-2xl dark:text-white">
                Create a new account
            </div>
            <span class="justify-center text-sm text-center text-gray-500 flex-items-center dark:text-gray-400">
                Already have an account ?
                <a href="#" target="_blank" class="text-sm text-blue-500 underline hover:text-blue-700">
                    Sign in
                </a>
            </span>
            <div class="p-6 mt-8">
                <form>
                    <div class="flex flex-col mb-2">
                        <div class=" relative ">
                            <input v-model="details.name" type="text" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" name="names" placeholder="Names"/>
                        </div>
                    </div>
                    <div class="flex flex-col mb-2">
                        <div class=" relative ">
                            <input v-model="details.email" type="email" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Email"/>
                        </div>
                    </div>
                    <div class="flex flex-col mb-2">
                        <div class=" relative ">
                            <input v-model="details.password" type="password" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" name="password" placeholder="Password"/>
                        </div>
                    </div>
                    <div class="flex items-center justify-left mt-6">
                        <div>
                            <p class="mb-6 text-lg font-light text-gray-600 sm:text-lg dark:text-white">
                                Select Package
                            </p>
                        </div>
                    </div>
                    <div class="flex flex-col mb-2">
                        <div class="relative">          
                            <select v-model="details.package_id" class="block w-52 text-gray-700 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500" name="animals">
                                <option value="">
                                    Select an option
                                </option>
                                <option value="1">
                                    Basic : $50/month
                                </option>
                                <option value="2">
                                    Standard: $75/month
                                </option>
                                <option value="3">
                                    Premium: $125/month
                                </option>
                            </select>
                        </div>
                    </div>
                   
                    <div class="flex w-full my-4">
                        <button @click="save" class="py-2 px-4  bg-purple-600 hover:bg-purple-700 focus:ring-purple-500 focus:ring-offset-purple-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                            Register
                        </button>
                    </div>
                    </form>
                    
                </div>
        </div>

    </div>
</template>

<script>

import {mapActions} from 'vuex'

export default {
    data(){
        return {
            details: {
                name: '',
                email: '',
                password: '',
                package_id: ''
            }
        }
    },

    methods: {
        ...mapActions(['register']),

        save(e){
            e.preventDefault()

            this.register(this.details).then( response =>{
                alert("Success")

            }).catch( error => {

                alert('Error')
            })
        }
    }
}
</script>