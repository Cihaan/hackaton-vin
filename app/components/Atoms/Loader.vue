<script setup lang="ts">

</script>

<template>
  <section>
    <div class="loader">
      <div class="wineglass left">
        <div class="top"></div>
      </div>
      <div class="wineglass right">
        <div class="top"></div>
      </div>
    </div>
  </section>
</template>

<style scoped>
section {
  margin: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.wineglass {
  height: 36px;
  position: relative;
}

.wineglass:after {
  content: '';
  position: absolute;
  top: 47px;
  left: 5px;
  width: 20px;
  height: 5px;
  background: black;
  box-shadow: 0 0 1px black;
}

.top {
  background: black;
  width: 30px;
  height: 36px;
  border-radius: 0 0 36px 36px;
  box-shadow: 0 0 1px black;
}

.top:before {
  content: '';
  position: absolute;
  left: 4px;
  bottom: 4px;
  width: 22px;
  height: 22px;
  border-radius: 50%;
  background: linear-gradient(transparent 50%, white 50%);
}

.top:after {
  content: '';
  position: absolute;
  top: 35px;
  left: 12px;
  width: 6px;
  height: 13px;
  background: black;
  box-shadow: 0 0 1px black;
}

.left {
  display: inline-block;
  margin-right: 10px;
  animation: rotate1 2s cubic-bezier(0.39, 1.52, 0.46, 0.92) infinite;
}

.left .top:before {
  animation: rotate2 2s linear infinite;
}

.right {
  display: inline-block;
  animation: rotate2 2s cubic-bezier(0.39, 1.52, 0.46, 0.92) infinite;
}

.right .top:before {
  animation: rotate1 2s linear infinite;
}

@keyframes rotate1 {
  0% {
    transform: rotate(0deg);
  }
  50% {
    transform: rotate(22deg);
  }
}

@keyframes rotate2 {
  0% {
    transform: rotate(0deg);
  }
  50% {
    transform: rotate(-22deg);
  }
}

</style>