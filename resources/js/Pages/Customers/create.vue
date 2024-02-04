<script setup>

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { reactive } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import InputError from '@/Components/InputError.vue';

defineProps({
  errors: Object,
});

const form = reactive({
  name: null,
  kana: null,
  tel: null,
  email: null,
  birthday: null,
  firstvisit: null,
})

const storeCustomer = () => {
  Inertia.post(route('customers.store'), form);
}

// const storeDelete = (id) => {
//   if (window.confirm('削除してもよろしいですか?')){
//     Inertia.delete(route('bottles.destroy', { id }));
//   }

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">

                        <form @submit.prevent="storeCustomer" class="lg:w-2/3 md:w-2/3 mx-auto">

                            <div class="w-full mb-4">
                                <InputError :message="errors.name"></inputError>
                                <InputError :message="errors.kana"></inputError>
                                <InputError :message="errors.tel"></inputError>
                                <InputError :message="errors.email"></inputError>
                                <InputError :message="errors.birthday"></inputError>
                                <InputError :message="errors.firstvisit"></inputError>
                             </div>

                          <div class="flex flex-wrap -m-2 items-center">
                            <div class="p-2 w-full">
                              <div class="relative">
                                <label for="name" class="leading-7 text-sm text-gray-600">お客様氏名</label>
                                <input v-model="form.name" type="text" id="name" name="name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                              </div>
                            </div>
                            <div class="p-2 w-full">
                              <div class="relative">
                                <label for="kana" class="leading-7 text-sm text-gray-600">お客様カナ</label>
                                <input v-model="form.kana" type="text" id="kana" name="kana" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                              </div>
                            </div>
                            <div class="p-2 w-full">
                              <div class="relative">
                                <label for="tel" class="leading-7 text-sm text-gray-600">電話番号</label>
                                <input v-model="form.tel" type="text" id="tel" name="tel" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                              </div>
                            </div>
                            <div class="p-2 w-full">
                              <div class="relative">
                                <label for="e-mail" class="leading-7 text-sm text-gray-600">アドレス</label>
                                <input v-model="form.email" type="email" id="e-mail" name="e-mail" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                              </div>
                            </div>
                            <div class="p-2 w-full">
                              <div class="relative">
                                <label for="birthday" class="leading-7 text-sm text-gray-600">誕生日</label>
                                <input v-model="form.birthday" type="date" id="birthday" name="birthday" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                              </div>
                            </div>
                            <div class="p-2 w-full">
                              <div class="relative">
                                <label for="firstvisit" class="leading-7 text-sm text-gray-600">初回来店日</label>
                                <input v-model="form.firstvisit" type="date" id="firstvisit" name="firstvisit" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                              </div>
                            </div>
                            <div class="mt-6 w-full">
                              <button type="submit" class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">登録</button>
                            </div>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
