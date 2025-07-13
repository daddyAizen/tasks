<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';

interface Task {
    id: number;
    user_id: string;
    user: User;
    title: string;
    description: string;
    deadline: number;
    status: string;
    created_at: number;
    updated_at: number;
}

interface Props {
    tasks: Task[];
}

const props = defineProps<Props>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Tasks',
        href: '/tasks',
    },
];
</script>

<template>
    <Head title="Tasks" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="p-4">
            <!-- Flash Message -->
            <div v-if="$page.props.flash?.message" class="mb-4">
                <Alert class="bg-blue-200">
                    <Rocket class="h-4 w-4" />
                    <AlertTitle>Notification</AlertTitle>
                    <AlertDescription>
                        {{ $page.props.flash.message }}
                    </AlertDescription>
                </Alert>
            </div>
        </div>
        <!-- Table Section -->
        <div class="max-w-[100vw] py-2 sm:px-6 lg:px-8 lg:py-2">
            <!-- Card -->
            <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="inline-block min-w-full p-1.5 align-middle">
                        <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-2xs">
                            <!-- Header -->
                            <div class="grid gap-3 border-b border-gray-200 px-6 py-4 md:flex md:items-center md:justify-between">
                                <div>
                                    <h2 class="text-xl font-semibold text-gray-800">Tasks</h2>
                                </div>

                                <div>
                                    <div class="inline-flex gap-x-2">
                                        <Link :href="route('tasks.create')">
                                            <Button>
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
                                                    <path d="M5 12h14" />
                                                    <path d="M12 5v14" />
                                                </svg>
                                                Create Task</Button
                                            >
                                        </Link>
                                    </div>
                                </div>
                            </div>
                            <!-- End Header -->

                            <!-- Table -->
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span class="text-xs font-semibold text-gray-800 uppercase"> Id </span>
                                            </div>
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span class="text-xs font-semibold text-gray-800 uppercase"> Name </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span class="text-xs font-semibold text-gray-800 uppercase"> Assigned USer </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span class="text-xs font-semibold text-gray-800 uppercase"> Date Created </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span class="text-xs font-semibold text-gray-800 uppercase"> Status </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span class="text-xs font-semibold text-gray-800 uppercase"> Last Updated </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span class="text-xs font-semibold text-gray-800 uppercase"> Deadline </span>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody v-for="task in props.tasks" :key="task.id" class="divide-y divide-gray-200">
                                    <tr>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <span class="text-sm text-gray-600">{{ task.id }}</span>
                                            </div>
                                        </td>

                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <span class="text-sm text-gray-600">{{ task.title }}</span>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <div class="flex items-center gap-x-2">
                                                    <div class="grow">
                                                        <span class="text-sm text-gray-600">{{ task.user?.name ?? 'N/A' }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <button
                                                    type="button"
                                                    class="inline-flex items-center gap-x-2 rounded-lg border border-gray-200 bg-white px-3 py-2 text-xs text-gray-800 shadow-2xs hover:bg-gray-50 focus:bg-gray-50 focus:outline-hidden disabled:pointer-events-none disabled:opacity-50"
                                                >
                                                    {{ task.created_at }}
                                                </button>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <span
                                                    class="inline-flex items-center gap-x-1 rounded-full bg-teal-100 px-1.5 py-1 text-xs font-medium text-teal-800"
                                                >
                                                    <svg
                                                        class="size-2.5"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        width="16"
                                                        height="16"
                                                        fill="currentColor"
                                                        viewBox="0 0 16 16"
                                                    >
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"
                                                        />
                                                    </svg>
                                                    Successful
                                                </span>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <button
                                                    type="button"
                                                    class="inline-flex items-center gap-x-2 rounded-lg border border-gray-200 bg-white px-3 py-2 text-xs text-gray-800 shadow-2xs hover:bg-gray-50 focus:bg-gray-50 focus:outline-hidden disabled:pointer-events-none disabled:opacity-50"
                                                >
                                                    {{ task.updated_at }}
                                                </button>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <span class="text-sm text-gray-600">{{ task.deadline }}</span>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- End Table -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Card -->
        </div>
        <!-- End Table Section -->
    </AppLayout>
</template>
