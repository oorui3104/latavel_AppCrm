<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import { ref, onMounted } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import Pagination from '@/Components/Pagination.vue'
import FlashMessage from '@/Components/FlashMessage.vue';

defineProps({
    customers: Object, 
});

const search = ref('');

const searchCustomer = () => {
  Inertia.get(route('customers.index'), { search: search.value });
}

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">お客様情報</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">

                        <FlashMessage />

                        <div class="w-full md:flex md:justify-between">

                     

                            <div class="flex md:mt-0 mt-4">
                                <input type="text" v-model="search" 
                                class="mr-4"
                                 placeholder="名前(かな可)">
                                <button @click="searchCustomer" class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">
                                    検索
                                </button>
                            </div>

                            <button class=" text-white bg-indigo-500 border-0 md:mt-0 mt-8 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">
                                    <Link as="button" :href="route('customers.create')">新規登録</Link>
                            </button>

                        </div>
                       
                        <div v-if="customers.data && customers.data.length > 0" class="w-full mx-auto overflow-auto mt-8">
                          <table class="table-auto w-full text-left border border-collapse text-center">
                            <thead>
                                <tr>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 border-b border-gray-300 border-r rounded-tl rounded-bl text-center">お名前</th>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 border-b border-gray-300 border-r text-center">ふりがな</th>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 border-b border-gray-300 border-r text-center">電話番号</th>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 border-b border-gray-300 border-r text-center">アドレス</th>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 border-b border-gray-300 border-r text-center">誕生日</th>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 border-b border-gray-300 border-r text-center">初回来店日</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="customer in customers.data" :key="customer.id" class="border-b border-gray-300">
                                    <td class="px-4 py-3 text-center border-r">
                                        <Link :href="route('customers.edit', { id: customer.id })" class="text-blue-400">
                                            {{ customer.name }}
                                        </Link>
                                    </td>
                                    <td class="px-4 py-3 text-center border-r">{{ customer.kana }}</td>
                                    <td class="px-4 py-3 text-center border-r">{{ customer.tel }}</td>
                                    <td class="px-4 py-3 text-center border-r">{{ customer.email }}</td>
                                    <td class="px-4 py-3 text-center border-r">{{ customer.birthday }}</td>
                                    <td class="px-4 py-3 text-center border-r">{{ customer.firstvisit }}</td>
                                </tr>
                            </tbody>
                          </table>
                        </div>

                        <div v-else class="mt-8  text-red-500">
                            対象が見つかりませんでした。
                        </div>

                        <Pagination class="mt-6" :links="customers.links"></Pagination>

                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
