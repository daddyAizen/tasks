<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, usePage } from '@inertiajs/vue3';

const user = usePage().props.auth.user;
const props = defineProps<{
    totals: {
        users: number;
        pending: number;
        in_progress: number;
        completed: number;
    };
    tasks: {
        pending: any[];
        in_progress: any[];
        completed: any[];
    };
}>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];
</script>

<template>
    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
            <p class="py-3 text-2xl font-semibold text-gray-500">Hello, {{ user.name }}</p>

            <!-- Card Section -->
            <div class="py-5 lg:py-5">
                <!-- Grid -->
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 lg:grid-cols-4">
                    <!-- Card -->
                    <div class="flex flex-col rounded-xl border border-gray-200 bg-white shadow-2xs dark:border-neutral-800 dark:bg-neutral-900">
                        <div class="flex justify-between gap-x-3 p-4 md:p-5">
                            <div>
                                <p class="text-xs text-gray-500 uppercase dark:text-neutral-500">Total users</p>
                                <div class="mt-1 flex items-center gap-x-2">
                                    <h3 class="text-xl font-medium text-gray-800 sm:text-2xl dark:text-neutral-200">{{ props.totals.users }}</h3>
                                    <span class="flex items-center gap-x-1 text-green-600"> </span>
                                </div>
                            </div>
                            <div
                                class="flex size-11 shrink-0 items-center justify-center rounded-full bg-blue-600 text-white dark:bg-blue-900 dark:text-blue-200"
                            >
                                <svg
                                    class="size-5 shrink-0"
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                >
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                    <circle cx="9" cy="7" r="4" />
                                    <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                </svg>
                            </div>
                        </div>

                        <a
                            class="inline-flex items-center justify-between rounded-b-xl border-t border-gray-200 px-4 py-3 text-sm text-gray-600 hover:bg-gray-50 focus:bg-gray-50 focus:outline-hidden md:px-5 dark:border-neutral-800 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                            href="#"
                        >
                            View Table
                            <svg
                                class="size-4 shrink-0"
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <path d="m9 18 6-6-6-6" />
                            </svg>
                        </a>
                    </div>
                    <!-- End Card -->

                    <!-- Card -->
                    <div class="flex flex-col rounded-xl border border-gray-200 bg-white shadow-2xs dark:border-neutral-800 dark:bg-neutral-900">
                        <div class="flex justify-between gap-x-3 p-4 md:p-5">
                            <div>
                                <p class="text-xs text-gray-500 uppercase dark:text-neutral-500">Total Complete Tasks</p>
                                <div class="mt-1 flex items-center gap-x-2">
                                    <h3 class="mt-1 text-xl font-medium text-gray-800 dark:text-neutral-200">{{ props.totals.completed }}</h3>
                                </div>
                            </div>
                            <div
                                class="flex size-11 shrink-0 items-center justify-center rounded-full bg-blue-600 text-white dark:bg-blue-900 dark:text-blue-200"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="lucide lucide-file-check2-icon lucide-file-check-2"
                                >
                                    <path d="M4 22h14a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v4" />
                                    <path d="M14 2v4a2 2 0 0 0 2 2h4" />
                                    <path d="m3 15 2 2 4-4" />
                                </svg>
                            </div>
                        </div>

                        <a
                            class="inline-flex items-center justify-between rounded-b-xl border-t border-gray-200 px-4 py-3 text-sm text-gray-600 hover:bg-gray-50 focus:bg-gray-50 focus:outline-hidden md:px-5 dark:border-neutral-800 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                            href="#"
                        >
                            View Table
                            <svg
                                class="size-4 shrink-0"
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <path d="m9 18 6-6-6-6" />
                            </svg>
                        </a>
                    </div>
                    <!-- End Card -->

                    <!-- Card -->
                    <div class="flex flex-col rounded-xl border border-gray-200 bg-white shadow-2xs dark:border-neutral-800 dark:bg-neutral-900">
                        <div class="flex justify-between gap-x-3 p-4 md:p-5">
                            <div>
                                <p class="text-xs text-gray-500 uppercase dark:text-neutral-500">Total In Progress Tasks</p>
                                <div class="mt-1 flex items-center gap-x-2">
                                    <h3 class="text-xl font-medium text-gray-800 sm:text-2xl dark:text-neutral-200">
                                        {{ props.totals.in_progress }}
                                    </h3>
                                    <span class="flex items-center gap-x-1 text-red-600"> </span>
                                </div>
                            </div>
                            <div
                                class="flex size-11 shrink-0 items-center justify-center rounded-full bg-blue-600 text-white dark:bg-blue-900 dark:text-blue-200"
                            >
                                <svg
                                    class="size-5 shrink-0"
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                >
                                    <path d="M5 22h14" />
                                    <path d="M5 2h14" />
                                    <path d="M17 22v-4.172a2 2 0 0 0-.586-1.414L12 12l-4.414 4.414A2 2 0 0 0 7 17.828V22" />
                                    <path d="M7 2v4.172a2 2 0 0 0 .586 1.414L12 12l4.414-4.414A2 2 0 0 0 17 6.172V2" />
                                </svg>
                            </div>
                        </div>

                        <a
                            class="inline-flex items-center justify-between rounded-b-xl border-t border-gray-200 px-4 py-3 text-sm text-gray-600 hover:bg-gray-50 focus:bg-gray-50 focus:outline-hidden md:px-5 dark:border-neutral-800 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                            href="#"
                        >
                            View Table
                            <svg
                                class="size-4 shrink-0"
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <path d="m9 18 6-6-6-6" />
                            </svg>
                        </a>
                    </div>
                    <!-- End Card -->

                    <!-- Card -->
                    <div class="flex flex-col rounded-xl border border-gray-200 bg-white shadow-2xs dark:border-neutral-800 dark:bg-neutral-900">
                        <div class="flex justify-between gap-x-3 p-4 md:p-5">
                            <div>
                                <p class="text-xs text-gray-500 uppercase dark:text-neutral-500">Total Pending Tasks</p>
                                <div class="mt-1 flex items-center gap-x-2">
                                    <h3 class="mt-1 text-xl font-medium text-gray-800 dark:text-neutral-200">{{ props.totals.pending }}</h3>
                                </div>
                            </div>
                            <div
                                class="flex size-11 shrink-0 items-center justify-center rounded-full bg-blue-600 text-white dark:bg-blue-900 dark:text-blue-200"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="lucide lucide-ellipsis-icon lucide-ellipsis"
                                >
                                    <circle cx="12" cy="12" r="1" />
                                    <circle cx="19" cy="12" r="1" />
                                    <circle cx="5" cy="12" r="1" />
                                </svg>
                            </div>
                        </div>

                        <a
                            class="inline-flex items-center justify-between rounded-b-xl border-t border-gray-200 px-4 py-3 text-sm text-gray-600 hover:bg-gray-50 focus:bg-gray-50 focus:outline-hidden md:px-5 dark:border-neutral-800 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                            href="#"
                        >
                            View Table
                            <svg
                                class="size-4 shrink-0"
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <path d="m9 18 6-6-6-6" />
                            </svg>
                        </a>
                    </div>
                    <!-- End Card -->
                </div>
                <!-- End Grid -->
            </div>
            <!-- End Card Section -->
            <div class="grid auto-rows-min gap-4 md:grid-cols-3">
                <div class="overflow relative aspect-video rounded-xl border border-sidebar-border/70 p-4 dark:border-sidebar-border">
                    <p class="mb-4 font-semibold text-green-500">All completed</p>

                    <!-- Scrollable wrapper -->
                    <div class="max-h-100 overflow-y-auto pr-2">
                        <div v-if="tasks.completed && tasks.completed.length > 0">
                            <!-- Item -->
                            <div v-for="tasks in tasks.completed" :key="tasks.id" class="group relative mb-6 flex gap-x-5">
                                <!-- Icon -->
                                <div
                                    class="relative after:absolute after:start-3 after:top-8 after:bottom-2 after:w-px after:-translate-x-[0.5px] after:bg-gray-200 group-last:after:hidden dark:after:bg-neutral-700"
                                >
                                    <div class="relative z-10 flex size-6 items-center justify-center">
                                        <svg
                                            class="size-6 shrink-0 text-gray-600 dark:text-neutral-400"
                                            width="32"
                                            height="32"
                                            viewBox="0 0 32 32"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                d="M11.7438 0.940745C6.84695 1.30308 2.6841 1.63631 2.48837 1.67533C1.9396 1.77319 1.44038 2.14544 1.20563 2.63537L1 3.06646L1.01982 13.3407L1.04893 23.615L1.36234 24.2517C1.53886 24.6042 2.73365 26.2499 4.0362 27.9439C6.61221 31.2836 6.79802 31.47 7.77726 31.5679C8.06156 31.597 10.1966 31.4991 12.5081 31.3622C14.8295 31.2154 18.5508 30.99 20.7842 30.863C30.3233 30.2839 29.8334 30.3328 30.3815 29.8627C31.0672 29.2947 31.0183 30.2251 31.0474 17.7377C31.0672 7.15003 31.0573 6.45509 30.9006 6.13177C30.7148 5.76943 30.3815 5.51487 26.0329 2.45885C23.1243 0.421704 22.9186 0.313932 21.6155 0.294111C21.0772 0.274911 16.6307 0.568497 11.7438 0.940745ZM22.752 2.28232C23.1633 2.46814 26.1704 4.56412 26.6108 4.9661C26.7284 5.08378 26.7675 5.18164 26.7086 5.24048C26.5717 5.35817 7.96245 6.465 7.42421 6.38634C7.17956 6.34732 6.81722 6.20052 6.61159 6.06302C5.75932 5.48514 3.64413 3.75149 3.64413 3.62452C3.64413 3.29129 3.57538 3.29129 11.8714 2.69421C13.4582 2.58644 16.0633 2.39071 17.6502 2.26312C21.0871 1.98874 22.1159 1.99865 22.752 2.28232ZM28.6677 7.63996C28.8046 7.77685 28.9223 8.04132 28.9613 8.29589C28.9904 8.53125 29.0102 12.9189 28.9904 18.0313C28.9613 26.8067 28.9514 27.3555 28.7848 27.61C28.6869 27.7667 28.4912 27.9333 28.3438 27.9823C27.9331 28.1489 8.43318 29.2557 8.03183 29.138C7.84601 29.0891 7.59083 28.9324 7.45394 28.7955L7.21858 28.541L7.18947 19.0799C7.16965 12.4395 7.18947 9.5012 7.26813 9.23672C7.32697 9.041 7.47376 8.80564 7.60136 8.72759C7.77788 8.60991 8.93364 8.51205 12.9101 8.2773C15.7016 8.1206 20.0206 7.85613 22.4987 7.70933C28.3933 7.34638 28.3741 7.34638 28.6677 7.63996Z"
                                                class="fill-black dark:fill-neutral-200"
                                                fill="currentColor"
                                            ></path>
                                            <path
                                                d="M23.4277 10.8818C22.3698 10.9506 21.4296 11.0484 21.3218 11.1073C20.9985 11.2739 20.8028 11.5483 20.7638 11.8617C20.7347 12.185 20.8325 12.224 21.8898 12.3516L22.35 12.4104V16.5925C22.35 19.0799 22.311 20.7256 22.2621 20.6767C22.2131 20.6178 20.8226 18.5027 19.167 15.9756C17.512 13.4392 16.1407 11.3525 16.1209 11.3333C16.1011 11.3135 15.024 11.3724 13.7313 11.4609C12.1445 11.5687 11.273 11.6666 11.0965 11.7644C10.8122 11.9112 10.4988 12.4303 10.4988 12.7734C10.4988 12.979 10.871 13.0868 11.6545 13.0868H12.0658V25.1139L11.4 25.3196C10.8809 25.4763 10.7044 25.5741 10.6165 25.7698C10.4598 26.1031 10.4697 26.4066 10.6264 26.4066C10.6852 26.4066 11.792 26.3378 13.0649 26.2598C15.582 26.113 15.8657 26.0442 16.1302 25.5252C16.2088 25.3685 16.277 25.2019 16.277 25.1529C16.277 25.1139 15.9345 24.9962 15.5226 24.8984C15.1014 24.8005 14.6802 24.7027 14.5923 24.6828C14.4257 24.6339 14.4157 24.3304 14.4157 20.1186V15.6033L17.3931 20.2753C20.5173 25.1721 20.9093 25.7308 21.3893 25.9755C21.987 26.2889 23.5051 26.0733 24.2688 25.5741L24.5042 25.4273L24.524 18.7479L24.5531 12.0586L25.0722 11.9608C25.6891 11.8431 25.9734 11.5594 25.9734 11.0695C25.9734 10.7561 25.9536 10.7362 25.66 10.7462C25.4847 10.7542 24.4757 10.813 23.4277 10.8818Z"
                                                class="fill-black dark:fill-neutral-200"
                                                fill="currentColor"
                                            ></path>
                                        </svg>
                                    </div>
                                </div>
                                <!-- End Icon -->

                                <!-- Right Content -->
                                <div class="grow pb-8 group-last:pb-0">
                                    <p class="text-sm font-semibold text-gray-800 dark:text-neutral-200">{{ tasks.title }}</p>

                                    <p class="mt-1 text-sm text-gray-600 dark:text-neutral-400">
                                        {{ tasks.description }}
                                    </p>
                                    <h3 class="mt-1 mb-1.5 text-xs dark:text-green-400">{{ tasks.deadline }}</h3>
                                </div>
                                <!-- End Right Content -->
                            </div>
                            <!-- End Item -->
                        </div>
                        <div v-else class="text-sm text-gray-500">No pending tasks.</div>
                    </div>
                </div>
                <div class="overflow relative aspect-video rounded-xl border border-sidebar-border/70 p-4 dark:border-sidebar-border">
                    <p class="mb-4 font-semibold text-blue-500">All in progress</p>

                    <!-- Scrollable wrapper -->
                    <div class="max-h-100 overflow-y-auto pr-2">
                        <div v-if="tasks.in_progress && tasks.in_progress.length > 0">
                            <!-- Item -->
                            <div v-for="tasks in tasks.in_progress" :key="tasks.id" class="group relative mb-6 flex gap-x-5">
                                <!-- Icon -->
                                <div
                                    class="relative after:absolute after:start-3 after:top-8 after:bottom-2 after:w-px after:-translate-x-[0.5px] after:bg-gray-200 group-last:after:hidden dark:after:bg-neutral-700"
                                >
                                    <div class="relative z-10 flex size-6 items-center justify-center">
                                        <svg
                                            class="size-6 shrink-0 text-gray-600 dark:text-neutral-400"
                                            width="32"
                                            height="32"
                                            viewBox="0 0 32 32"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                d="M11.7438 0.940745C6.84695 1.30308 2.6841 1.63631 2.48837 1.67533C1.9396 1.77319 1.44038 2.14544 1.20563 2.63537L1 3.06646L1.01982 13.3407L1.04893 23.615L1.36234 24.2517C1.53886 24.6042 2.73365 26.2499 4.0362 27.9439C6.61221 31.2836 6.79802 31.47 7.77726 31.5679C8.06156 31.597 10.1966 31.4991 12.5081 31.3622C14.8295 31.2154 18.5508 30.99 20.7842 30.863C30.3233 30.2839 29.8334 30.3328 30.3815 29.8627C31.0672 29.2947 31.0183 30.2251 31.0474 17.7377C31.0672 7.15003 31.0573 6.45509 30.9006 6.13177C30.7148 5.76943 30.3815 5.51487 26.0329 2.45885C23.1243 0.421704 22.9186 0.313932 21.6155 0.294111C21.0772 0.274911 16.6307 0.568497 11.7438 0.940745ZM22.752 2.28232C23.1633 2.46814 26.1704 4.56412 26.6108 4.9661C26.7284 5.08378 26.7675 5.18164 26.7086 5.24048C26.5717 5.35817 7.96245 6.465 7.42421 6.38634C7.17956 6.34732 6.81722 6.20052 6.61159 6.06302C5.75932 5.48514 3.64413 3.75149 3.64413 3.62452C3.64413 3.29129 3.57538 3.29129 11.8714 2.69421C13.4582 2.58644 16.0633 2.39071 17.6502 2.26312C21.0871 1.98874 22.1159 1.99865 22.752 2.28232ZM28.6677 7.63996C28.8046 7.77685 28.9223 8.04132 28.9613 8.29589C28.9904 8.53125 29.0102 12.9189 28.9904 18.0313C28.9613 26.8067 28.9514 27.3555 28.7848 27.61C28.6869 27.7667 28.4912 27.9333 28.3438 27.9823C27.9331 28.1489 8.43318 29.2557 8.03183 29.138C7.84601 29.0891 7.59083 28.9324 7.45394 28.7955L7.21858 28.541L7.18947 19.0799C7.16965 12.4395 7.18947 9.5012 7.26813 9.23672C7.32697 9.041 7.47376 8.80564 7.60136 8.72759C7.77788 8.60991 8.93364 8.51205 12.9101 8.2773C15.7016 8.1206 20.0206 7.85613 22.4987 7.70933C28.3933 7.34638 28.3741 7.34638 28.6677 7.63996Z"
                                                class="fill-black dark:fill-neutral-200"
                                                fill="currentColor"
                                            ></path>
                                            <path
                                                d="M23.4277 10.8818C22.3698 10.9506 21.4296 11.0484 21.3218 11.1073C20.9985 11.2739 20.8028 11.5483 20.7638 11.8617C20.7347 12.185 20.8325 12.224 21.8898 12.3516L22.35 12.4104V16.5925C22.35 19.0799 22.311 20.7256 22.2621 20.6767C22.2131 20.6178 20.8226 18.5027 19.167 15.9756C17.512 13.4392 16.1407 11.3525 16.1209 11.3333C16.1011 11.3135 15.024 11.3724 13.7313 11.4609C12.1445 11.5687 11.273 11.6666 11.0965 11.7644C10.8122 11.9112 10.4988 12.4303 10.4988 12.7734C10.4988 12.979 10.871 13.0868 11.6545 13.0868H12.0658V25.1139L11.4 25.3196C10.8809 25.4763 10.7044 25.5741 10.6165 25.7698C10.4598 26.1031 10.4697 26.4066 10.6264 26.4066C10.6852 26.4066 11.792 26.3378 13.0649 26.2598C15.582 26.113 15.8657 26.0442 16.1302 25.5252C16.2088 25.3685 16.277 25.2019 16.277 25.1529C16.277 25.1139 15.9345 24.9962 15.5226 24.8984C15.1014 24.8005 14.6802 24.7027 14.5923 24.6828C14.4257 24.6339 14.4157 24.3304 14.4157 20.1186V15.6033L17.3931 20.2753C20.5173 25.1721 20.9093 25.7308 21.3893 25.9755C21.987 26.2889 23.5051 26.0733 24.2688 25.5741L24.5042 25.4273L24.524 18.7479L24.5531 12.0586L25.0722 11.9608C25.6891 11.8431 25.9734 11.5594 25.9734 11.0695C25.9734 10.7561 25.9536 10.7362 25.66 10.7462C25.4847 10.7542 24.4757 10.813 23.4277 10.8818Z"
                                                class="fill-black dark:fill-neutral-200"
                                                fill="currentColor"
                                            ></path>
                                        </svg>
                                    </div>
                                </div>
                                <!-- End Icon -->

                                <!-- Right Content -->
                                <div class="grow pb-8 group-last:pb-0">
                                    <p class="text-sm font-semibold text-gray-800 dark:text-neutral-200">{{ tasks.title }}</p>

                                    <p class="mt-1 text-sm text-gray-600 dark:text-neutral-400">
                                        {{ tasks.description }}
                                    </p>
                                    <h3 class="mt-1 mb-1.5 text-xs dark:text-neutral-400">{{ tasks.deadline }}</h3>
                                </div>
                                <!-- End Right Content -->
                            </div>
                            <!-- End Item -->
                        </div>
                        <div v-else class="text-sm text-gray-500">No pending tasks.</div>
                    </div>
                </div>
                <div class="overflow relative aspect-video rounded-xl border border-sidebar-border/70 p-4 dark:border-sidebar-border">
                    <p class="mb-4 font-semibold text-red-500">All pending tasks</p>

                    <!-- Scrollable wrapper -->
                    <div class="max-h-100 overflow-y-auto pr-2">
                        <div v-if="tasks.pending && tasks.pending.length > 0">
                            <!-- Item -->
                            <div v-for="tasks in tasks.pending" :key="tasks.id" class="group relative mb-6 flex gap-x-5">
                                <!-- Icon -->
                                <div
                                    class="relative after:absolute after:start-3 after:top-8 after:bottom-2 after:w-px after:-translate-x-[0.5px] after:bg-gray-200 group-last:after:hidden dark:after:bg-neutral-700"
                                >
                                    <div class="relative z-10 flex size-6 items-center justify-center">
                                        <svg
                                            class="size-6 shrink-0 text-gray-600 dark:text-neutral-400"
                                            width="32"
                                            height="32"
                                            viewBox="0 0 32 32"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                d="M11.7438 0.940745C6.84695 1.30308 2.6841 1.63631 2.48837 1.67533C1.9396 1.77319 1.44038 2.14544 1.20563 2.63537L1 3.06646L1.01982 13.3407L1.04893 23.615L1.36234 24.2517C1.53886 24.6042 2.73365 26.2499 4.0362 27.9439C6.61221 31.2836 6.79802 31.47 7.77726 31.5679C8.06156 31.597 10.1966 31.4991 12.5081 31.3622C14.8295 31.2154 18.5508 30.99 20.7842 30.863C30.3233 30.2839 29.8334 30.3328 30.3815 29.8627C31.0672 29.2947 31.0183 30.2251 31.0474 17.7377C31.0672 7.15003 31.0573 6.45509 30.9006 6.13177C30.7148 5.76943 30.3815 5.51487 26.0329 2.45885C23.1243 0.421704 22.9186 0.313932 21.6155 0.294111C21.0772 0.274911 16.6307 0.568497 11.7438 0.940745ZM22.752 2.28232C23.1633 2.46814 26.1704 4.56412 26.6108 4.9661C26.7284 5.08378 26.7675 5.18164 26.7086 5.24048C26.5717 5.35817 7.96245 6.465 7.42421 6.38634C7.17956 6.34732 6.81722 6.20052 6.61159 6.06302C5.75932 5.48514 3.64413 3.75149 3.64413 3.62452C3.64413 3.29129 3.57538 3.29129 11.8714 2.69421C13.4582 2.58644 16.0633 2.39071 17.6502 2.26312C21.0871 1.98874 22.1159 1.99865 22.752 2.28232ZM28.6677 7.63996C28.8046 7.77685 28.9223 8.04132 28.9613 8.29589C28.9904 8.53125 29.0102 12.9189 28.9904 18.0313C28.9613 26.8067 28.9514 27.3555 28.7848 27.61C28.6869 27.7667 28.4912 27.9333 28.3438 27.9823C27.9331 28.1489 8.43318 29.2557 8.03183 29.138C7.84601 29.0891 7.59083 28.9324 7.45394 28.7955L7.21858 28.541L7.18947 19.0799C7.16965 12.4395 7.18947 9.5012 7.26813 9.23672C7.32697 9.041 7.47376 8.80564 7.60136 8.72759C7.77788 8.60991 8.93364 8.51205 12.9101 8.2773C15.7016 8.1206 20.0206 7.85613 22.4987 7.70933C28.3933 7.34638 28.3741 7.34638 28.6677 7.63996Z"
                                                class="fill-black dark:fill-neutral-200"
                                                fill="currentColor"
                                            ></path>
                                            <path
                                                d="M23.4277 10.8818C22.3698 10.9506 21.4296 11.0484 21.3218 11.1073C20.9985 11.2739 20.8028 11.5483 20.7638 11.8617C20.7347 12.185 20.8325 12.224 21.8898 12.3516L22.35 12.4104V16.5925C22.35 19.0799 22.311 20.7256 22.2621 20.6767C22.2131 20.6178 20.8226 18.5027 19.167 15.9756C17.512 13.4392 16.1407 11.3525 16.1209 11.3333C16.1011 11.3135 15.024 11.3724 13.7313 11.4609C12.1445 11.5687 11.273 11.6666 11.0965 11.7644C10.8122 11.9112 10.4988 12.4303 10.4988 12.7734C10.4988 12.979 10.871 13.0868 11.6545 13.0868H12.0658V25.1139L11.4 25.3196C10.8809 25.4763 10.7044 25.5741 10.6165 25.7698C10.4598 26.1031 10.4697 26.4066 10.6264 26.4066C10.6852 26.4066 11.792 26.3378 13.0649 26.2598C15.582 26.113 15.8657 26.0442 16.1302 25.5252C16.2088 25.3685 16.277 25.2019 16.277 25.1529C16.277 25.1139 15.9345 24.9962 15.5226 24.8984C15.1014 24.8005 14.6802 24.7027 14.5923 24.6828C14.4257 24.6339 14.4157 24.3304 14.4157 20.1186V15.6033L17.3931 20.2753C20.5173 25.1721 20.9093 25.7308 21.3893 25.9755C21.987 26.2889 23.5051 26.0733 24.2688 25.5741L24.5042 25.4273L24.524 18.7479L24.5531 12.0586L25.0722 11.9608C25.6891 11.8431 25.9734 11.5594 25.9734 11.0695C25.9734 10.7561 25.9536 10.7362 25.66 10.7462C25.4847 10.7542 24.4757 10.813 23.4277 10.8818Z"
                                                class="fill-black dark:fill-neutral-200"
                                                fill="currentColor"
                                            ></path>
                                        </svg>
                                    </div>
                                </div>
                                <!-- End Icon -->

                                <!-- Right Content -->
                                <div class="grow pb-8 group-last:pb-0">
                                    <p class="text-sm font-semibold text-gray-800 dark:text-neutral-200">{{ tasks.title }}</p>

                                    <p class="mt-1 text-sm text-gray-600 dark:text-neutral-400">
                                        {{ tasks.description }}
                                    </p>
                                    <h3 class="mt-1 mb-1.5 text-xs text-red-500 dark:text-neutral-400">{{ tasks.deadline }}</h3>
                                </div>
                                <!-- End Right Content -->
                            </div>
                            <!-- End Item -->
                        </div>
                        <div v-else class="text-sm text-gray-500">No pending tasks.</div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
