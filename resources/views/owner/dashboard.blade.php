<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Owner Dashboard') }} - {{ $restaurant->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Stats Overview -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
                <!-- Today's Revenue -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="text-gray-500 text-sm">Today's Revenue</div>
                        <div class="text-3xl font-bold">${{ number_format($todayRevenue, 2) }}</div>
                    </div>
                </div>

                <!-- Today's Orders -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="text-gray-500 text-sm">Today's Orders</div>
                        <div class="text-3xl font-bold">{{ $todayOrders }}</div>
                    </div>
                </div>

                <!-- Active Staff -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="text-gray-500 text-sm">Active Staff</div>
                        <div class="text-3xl font-bold">{{ $activeStaff }} / {{ $totalStaff }}</div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="text-gray-500 text-sm mb-2">Quick Actions</div>
                        <a href="#" class="text-blue-600 hover:text-blue-800 block">Invite Staff</a>
                        <a href="#" class="text-blue-600 hover:text-blue-800 block">View Reports</a>
                    </div>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Recent Activities -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-4">Recent Activities</h3>
                        @if(count($recentActivities) > 0)
                            <!-- Activities list -->
                        @else
                            <p class="text-gray-500">No recent activities</p>
                        @endif
                    </div>
                </div>

                <!-- Quick Stats -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-4">Restaurant Info</h3>
                        <div class="space-y-2">
                            <p><strong>Name:</strong> {{ $restaurant->name }}</p>
                            <p><strong>Owner:</strong> {{ auth()->user()->name }}</p>
                            <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
                            <p><strong>Phone:</strong> {{ auth()->user()->phone ?? 'Not set' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>