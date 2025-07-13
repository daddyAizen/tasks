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
        <div class="px-4 sm:px-6">
            <!-- Card -->
            <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="inline-block min-w-full p-1.5 align-middle">
                        <div
                            class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-2xs dark:border-neutral-700 dark:bg-neutral-900"
                        >
                            <!-- Header -->
                            <div
                                class="grid gap-3 border-b border-gray-200 px-6 py-4 md:flex md:items-center md:justify-between dark:border-neutral-700"
                            >
                                <div>
                                    <h2 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">Tasks</h2>
                                </div>
                                <div class="md:grow">
                                    <div class="flex justify-end gap-x-2">
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
                                                Create Task
                                            </Button>
                                        </Link>
                                    </div>
                                </div>
                            </div>
                            <!-- End Header -->

                            <!-- Table -->
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                                <thead class="bg-gray-50 dark:bg-neutral-800">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span class="text-xs font-semibold text-gray-800 uppercase dark:text-neutral-200"> Id </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span class="text-xs font-semibold text-gray-800 uppercase dark:text-neutral-200"> Name </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span class="text-xs font-semibold text-gray-800 uppercase dark:text-neutral-200"> Description </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span class="text-xs font-semibold text-gray-800 uppercase dark:text-neutral-200"> Deadline </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span class="text-xs font-semibold text-gray-800 uppercase dark:text-neutral-200"> Status </span>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody v-for="task in props.tasks" :key="task.id" class="divide-y divide-gray-200 dark:divide-neutral-700">
                                    <tr class="bg-white hover:bg-gray-50 dark:bg-neutral-900 dark:hover:bg-neutral-800">
                                        <td class="size-px align-top whitespace-nowrap">
                                            <a class="block p-6" href="#">
                                                <div class="flex items-center gap-x-4">
                                                    <div>
                                                        <span class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">{{
                                                            task.id
                                                        }}</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
                                        <td class="size-px align-top whitespace-nowrap">
                                            <a class="block p-6" href="#">
                                                <div class="flex items-center gap-x-3">
                                                    <div class="grow">
                                                        <span class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">{{
                                                            task.user?.name ?? 'N/A'
                                                        }}</span>
                                                        <span class="block text-sm text-gray-500 dark:text-neutral-500">{{
                                                            task.user?.email ?? 'N/A'
                                                        }}</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
                                        <td class="h-px w-72 min-w-72 align-top">
                                            <a class="block p-6" href="#">
                                                <span class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">{{ task.title }}</span>
                                                <span class="block text-sm text-gray-500 dark:text-neutral-500">{{ task.description }}</span>
                                            </a>
                                        </td>
                                        <td class="size-px align-top whitespace-nowrap">
                                            <a class="block p-6" href="#">
                                                <span class="text-sm text-gray-600 dark:text-neutral-400">{{ task.deadline }}</span>
                                            </a>
                                        </td>
                                        <td class="size-px align-top whitespace-nowrap">
                                            <a class="block p-6" href="#">
                                                <span
                                                    :class="[
                                                        'inline-flex items-center gap-x-1 rounded-full px-1.5 py-1 text-xs font-medium',
                                                        task.status === 'Pending'
                                                            ? 'bg-orange-100 text-orange-800 dark:bg-orange-900 dark:text-green-200'
                                                            : task.status === 'In_progress'
                                                              ? 'rounded-full bg-blue-200 text-teal-800 dark:bg-blue-500/10 dark:text-blue-500'
                                                              : task.status === 'completed'
                                                                ? 'rounded-full bg-teal-100 text-teal-800 dark:bg-teal-500/10 dark:text-teal-500'
                                                                : 'bg-gray-100 text-gray-800 dark:bg-gray-500/10 dark:text-gray-500',
                                                    ]"
                                                >
                                                    {{ task.status }}
                                                </span>
                                            </a>
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
