<template>
    <div class="mt-24 flex flex-col justify-center not-found">
        <h1>404 - Page Not Found</h1>
        <p>Oops! The page you are looking for does not exist.</p>
    </div>
</template>

<script setup></script>
<style scoped>
.not-found {
    text-align: center;
    height: 50vh;
}

h1 {
    font-size: 3em;
    color: #333;
}

p {
    font-size: 1.2em;
    color: #666;
}

router-link {
    display: block;
    margin-top: 20px;
    font-size: 1.2em;
    text-decoration: none;
    color: #007bff;
}
</style>
