<template>
    <div class="bg-gray-900 absolute top-12 p-4 rounded-b-lg text-md w-60">
        <ul>
            <li class="pb-3 pt-2" v-for="item in subitems" :key="item.name">
            <a class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md font-medium" :href="item.href">{{ item.name }}</a>
            </li>
        </ul>
    </div>
</template>

<script lang="ts">
import { defineComponent} from 'vue';
import { NavigationItem } from '../interfaces/INavigationItem';
import { PropType } from 'vue';

export default defineComponent({
    name: 'SubMenu',
    props:{
        subitems: { type: Array<NavigationItem>, required: true }
    }


});
</script>
