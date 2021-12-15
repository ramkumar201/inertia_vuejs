
<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                View Post
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">

                       <div class="mb-4">
                            <label for="title">Post Id</label>
                            <input type="text" disabled class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" v-model="form.id">
                        </div>

                        <div class="mb-4">
                            <label for="title">Title</label>
                            <input type="text" disabled class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" placeholder="Title" v-model="form.title">
                        </div>

                        <div class="mb-4">
                            <label for="body">Body</label>
                            <textarea disabled class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="body" v-model="form.body" placeholder="Enter Body"></textarea>
                        </div>

                        <!-- <div class="mb-4">
                            <img class="image-circle" :src="getImage()">
                        </div> -->

                        <inertia-link :href="route('posts.index')" class="bg-blue-700 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Back</inertia-link>

                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>

    import AppLayout from '@/Layouts/AppLayout'
    import Welcome from '@/Jetstream/Welcome'

export default {
        components: {
            AppLayout,
            Welcome,
        },
        props:{
            post: Object,

        },
        data() {
            return {
                form: {
                    id: this.post.id,
                    title: this.post.title,
                    body: this.post.body,
                    image: '',
                }
            }
        },
        methods: {
            // getImage() {
            //     return './public/'+this.post.image;
            // }
        }
}
</script>
