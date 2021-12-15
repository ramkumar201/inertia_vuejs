<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Posts
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

                    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-blue-900 px-4 py-3 shadow-md " role="alert" v-if="$page.props.success">
                        <div class="flex">
                            <div>
                                <p class="text-sm">{{ $page.props.success }}</p>
                            </div>
                        </div>
                    </div>
                    <br>
                    <inertia-link :href="route('posts.create')" class="bg-pink-700 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded">Create New Post</inertia-link>
                    <br>
                    <br>
                    <table class="table-fixed w-full">
                        <thead>
                            <tr class="bg-pink-100">
                                <th class="px-4 py-2 w-20">Id</th>
                                <th class="px-4 py-2 ">Title</th>
                                <th class="px-4 py-2 ">Body</th>
                                <th class="px-4 py-2 ">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-if="posts == 0">
                                <td colspan="4" class="text-center">No Post found</td>
                            </tr>
                            <tr v-for="post in posts" :key="post.id" >
                                <td class="border px-4 py-2">{{ post.id }}</td>
                                <td class="border px-4 py-2">{{ post.title }}</td>
                                <td class="border px-4 py-2">{{ post.body }}</td>
                                <td class="border px-4 py-2">
                                    <inertia-link :href="route('posts.show', { id: post.id })" class="bg-green-700 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">View</inertia-link>&nbsp;&nbsp;
                                    <inertia-link :href="route('posts.edit', { id: post.id })" class="bg-blue-700 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</inertia-link>&nbsp;&nbsp;
                                    <!-- <inertia-link :href="route('posts.destroy', { id: post.id })"  class="bg-red-700 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Delete</inertia-link> -->
                                    <!-- <button @click="editRow()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Edit</button> -->
                                    <button @click="deleteRow(post.id)" class="bg-red-500 hover:bg-indianred-700 text-white font-bold py-2 px-4 rounded my-3">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
        props: ['posts','success'],

        methods: {

            deleteRow($post) {
                if (confirm('Are you sure want to remove the post?')) {
                    this.$inertia.delete(this.route('posts.destroy',$post))
            }
        },

    }
}
</script>
