<template>
  <div>
    <!--    <div class="flex flex-wrap">-->
    <!--      <div class="w-full xl:w-8/12 mb-12 xl:mb-0 px-4">-->
    <!--        <card-line-chart />-->
    <!--      </div>-->
    <!--      <div class="w-full xl:w-4/12 px-4">-->
    <!--        <card-bar-chart />-->
    <!--      </div>-->
    <!--    </div>-->
    <div class="flex flex-wrap mt-4">
      <div class="w-full xl:w-8/12 mb-12 xl:mb-0 px-4">
        <CardPageVisits />
      </div>
      <div class="w-full xl:w-4/12 px-4">
        <CardSocialTraffic />
      </div>
    </div>
    <div class="flex flex-wrap mt-4">
      <div class="w-full xl:w-8/12 mb-12 xl:mb-0 px-4">
        <CardPageVisits />
      </div>
      <div class="w-full xl:w-4/12 px-4">
        <CardSocialTraffic />
      </div>
    </div>
  </div>
</template>
<script>
import CardPageVisits from "../../../components/Cards/CardPageVisits.vue";
import CardSocialTraffic from "../../../components/Cards/CardSocialTraffic.vue";

export default {
  name: "dashboard-page",
  components: {CardSocialTraffic, CardPageVisits},
};
</script>
