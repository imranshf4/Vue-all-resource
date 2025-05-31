<template lang="">
    <p>{{ a>b ? 'a is greater than b' : 'b is greater than a'}}</p>
    <img :src="userInfo.imageUrl" width="100" height="100" alt="">
    <h1>{{ userInfo.name }}</h1>
    <p>Profession: <span v-html="userInfo.profession"></span></p>
    <h2>{{ userInfo.age }}</h2>
    <h3>{{ userInfo.city }}</h3>
    <a v-if="userInfo.profileUrl" :href="userInfo.profileUrl">profileUrl</a>
    <h2>{{ message }}</h2>
    <h2 v-if="userInfo.role === 'admin'">Hello Admin</h2>
    <h2 v-else-if="userInfo.role === 'user'">Hello User</h2>
    <h2 v-else-if="userInfo.role === 'guest'">Hello Guest</h2>
    <h2 v-else>Unknown role</h2>
</template>
<script setup>
import { userInfo } from '@/data/data';
const a=5;
const b=10;

let message = 'Hello';
if(userInfo.role === 'admin') {
    message = 'Hello Admin';
}  else {
    message = 'Hello User';
} 
</script>

<script>
export default {

}
</script>
/*89  
/*89  
<style lang="">

</style>