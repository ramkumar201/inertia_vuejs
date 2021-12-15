<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Update Post
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">

                    <form action="" method="post" class="my-5" @submit.prevent="updatePost">


                        <div class="mb-4">
                            <label for="title">Post Id</label>&nbsp;&nbsp;<span style="font-size:12px;color:red">(id not editable)</span>
                            <input type="text" disabled class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" v-model="form.id">
                        </div>

                        <div class="mb-4">
                            <label for="title">Title</label><span style="color:red">*</span>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" placeholder="Title" v-model="form.title">
                            <div v-if="this.$props.errors.title" class="text-red-500">{{ this.$props.errors.title }}</div>
                        </div>

                        <div class="mb-4">
                            <label for="body">Body</label><span style="color:red">*</span>
                            <textarea rows="10" cols="10" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="body" v-model="form.body" placeholder="Enter Body"></textarea>
                            <div v-if="this.$props.errors.body" class="text-red-500">{{ this.$props.errors.body }}</div>
                        </div>
                        <button type="submit" class="bg-blue-500 hover:bg-lightblue-700 text-white font-bold py-2 px-4 rounded my-3">Update</button>&nbsp;&nbsp;
                        <inertia-link :href="route('posts.index')" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded my-3">Back</inertia-link>

                    </form>
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
    props: ['post', 'errors'],
        components: {
            AppLayout,
            Welcome,
        },

         data() {
            return {
                form: this.$inertia.form({
                    id: this.post.id,
                    title: this.post.title,
                    body: this.post.body,
                })
            }
        },
        methods: {
            updatePost() {
                this.form.patch(this.route('posts.update', this.post ))
            },
        }
}
</script>
