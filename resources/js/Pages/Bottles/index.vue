<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { reactive } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import InputError from '@/Components/InputError.vue';
import FlashMessage from '@/Components/FlashMessage.vue';

defineProps({
  errors: Object,
  bottles: Array
});

const form = reactive({
  name: null,
  price: null
})

const storeBottle = () => {
  Inertia.post(route('bottles.store'), form);
}

const storeDelete = (id) => {
  if (window.confirm('削除してもよろしいですか?')){
    Inertia.delete(route('bottles.destroy', { id }));
  }
}

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">ボトル情報</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <section class="text-gray-600 body-font relative">
                      <div class="container px-5 py-4 mx-auto">
                        
                        <FlashMessage />
                        <InputError :message="errors.name"></inputError>
                        <InputError :message="errors.price"></inputError>

                        <form @submit.prevent="storeBottle" class="lg:w-2/3 md:w-2/3 mx-auto">
                          <div class="flex flex-wrap -m-2 items-center">
                            <div class="p-2 w-1/3">
                              <div class="relative">
                                <label for="name" class="leading-7 text-sm text-gray-600">ボトル名</label>
                                <input v-model="form.name" type="text" id="name" name="name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                              </div>
                            </div>
                            <div class="p-2 w-1/3">
                              <div class="relative">
                                <label for="price" class="leading-7 text-sm text-gray-600">価格</label>
                                <input v-model="form.price" type="number" id="price" name="price" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                              </div>
                            </div>
                            <div class="mt-6 w-1/3">
                              <button type="submit" class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">登録</button>
                            </div>
                          </div>
                        </form>

                        <div v-show="bottles" class="lg:w-2/3 w-full mx-auto overflow-auto mt-8">
                          <table class="table-auto w-full text-left border border-collapse text-center">
                            <thead>
                                <tr>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 border-b border-gray-300 border-r rounded-tl rounded-bl text-center">ボトル名</th>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 border-b border-gray-300 border-r text-center">値段</th>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 border-b border-gray-300 border-r text-center">削除</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="bottle in bottles" :key="bottle.id" class="border-b border-gray-300">
                                    <td class="px-4 py-3 text-center border-r">{{ bottle.name }}</td>
                                    <td class="px-4 py-3 text-center border-r">{{ bottle.price }}</td>
                                    <td class="px-4 py-3 text-center">
                                        <button @click="storeDelete(bottle.id)" class="text-red-500">削除</button>
                                    </td>
                                </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </section>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
