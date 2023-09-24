<template>
  <div>
    <AdminSidebar />
    <div class="relative md:ml-64 bg-blueGray-100">
      <AdminNavbar />
      <AdminHeader />
      <div class="px-4 md:px-10 mx-auto w-full -m-24">
        <RouterView />
        <AdminFooter />
      </div>
    </div>
  </div>
</template>
