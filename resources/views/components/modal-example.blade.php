{{-- <!-- Example usage of the modal component with card UI, focus/hover, badges, and animation -->
<x-modal wire:model="showModal">
    <div class="flex flex-col items-center">
        <span class="inline-block px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-semibold mb-2">Success</span>
        <h2 class="text-2xl font-bold mb-2">Action Completed</h2>
        <p class="text-gray-700 mb-4">Your document has been uploaded successfully. You can view or download it from your dashboard.</p>
        <table class="w-full border rounded-xl overflow-hidden shadow text-sm mb-4 animate-table-fade">
            <thead>
                <tr class="bg-green-100 text-green-700">
                    <th class="p-2 border">File Name</th>
                    <th class="p-2 border">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr class="hover:bg-green-50 transition-colors">
                    <td class="border p-2">demo.pdf</td>
                    <td class="border p-2"><span class="inline-block px-2 py-1 rounded bg-blue-100 text-blue-700 text-xs">Uploaded</span></td>
                </tr>
            </tbody>
        </table>
        <button class="bg-gradient-to-r from-green-500 to-green-700 text-white px-6 py-2 rounded-xl shadow-lg font-bold text-lg hover:scale-105 focus:outline-none focus:ring-2 focus:ring-green-500 transition-all duration-200">Close</button>
    </div>
</x-modal>

<!-- Site-wide animation example: fade-in for main content -->
<style>
@keyframes site-fade-in {
  from { opacity: 0; transform: translateY(40px); }
  to { opacity: 1; transform: translateY(0); }
}
.animate-site-fade-in {
  animation: site-fade-in 0.6s cubic-bezier(0.4,0,0.2,1);
}
@keyframes table-fade {
  from { opacity: 0; }
  to { opacity: 1; }
}
.animate-table-fade {
  animation: table-fade 0.5s ease;
}
</style>

<!-- Example: Add 'animate-site-fade-in' to your main content divs for a smooth entrance effect -->
<!-- <div class="main-content animate-site-fade-in"> ... </div> --> --}}
