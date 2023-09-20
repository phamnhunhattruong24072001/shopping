<template>
  <div>
    <admin-sidebar />
    <div class="relative md:ml-64 bg-blueGray-100">
      <admin-navbar />
      <admin-header />
      <div class="px-4 md:px-10 mx-auto w-full -m-24">
        <router-view />
        <admin-footer />
      </div>
    </div>
  </div>
</template>
