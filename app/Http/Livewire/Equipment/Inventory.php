<?php

namespace App\Http\Livewire\Equipment;

use App\Models\Charge;
use App\Models\Device;
use App\Models\User;
use Livewire\Component;

class Inventory extends Component
{
    public $isModalVisible = false;
    public $isChargeHistoryModalVisible = false;
    public $isChargeToEmployeeModalVisible = false;
    public $isDestroyModalVisible = false;
    public $isEditModalVisible = false;
    public $isFreeDaysModalVisible = false;
    public $searchTerm;
    public $deviceId;
    public $item;
    public $serialNumber;
    public $inventoryNumber;
    public $charged;
    public $userEmail;

    protected $listeners = ['updateInventoryView' => 'render'];

    public function render()
    {
        $searchString = '%' . $this->searchTerm . '%';

        return view('livewire.equipment.inventory', [
            'devices' => Device::where('item', 'like', $searchString)
                ->orWhere('serial_number', 'like', $searchString)
                ->orWhere('inventory_number', 'like', $searchString)
                ->paginate(10),
            'users' => User::all(),
            'charges' => Charge::where('device_id', $this->deviceId)->orderBy('created_at', 'DESC')->get(),
        ]);
    }

    public function showCreateModal(): void
    {
        $this->reset();
        $this->isModalVisible = true;
    }

    public function showEditModal($id): void
    {
        $this->deviceId = $id;
        $this->isEditModalVisible = true;
        $this->loadDeviceModel();
    }

    public function showDestroyModal($id): void
    {
        $this->deviceId = $id;
        $this->isDestroyModalVisible = true;
    }

    public function showChargeHistoryModal($id): void
    {
        $this->deviceId = $id;
        $this->isChargeHistoryModalVisible = true;
    }

    public function showChargeToEmployeeModal($id): void
    {
        $this->deviceId = $id;
        $this->isChargeToEmployeeModalVisible = true;
    }

    public function loadDeviceModel(): void
    {
        $device = Device::find($this->deviceId);
        $this->item = $device->item;
        $this->serialNumber = $device->serial_number;
        $this->inventoryNumber = $device->inventory_number;
        $this->charged = $device->charged;
    }

    public function modalInputData(): array
    {
        return [
            'item' => $this->item,
            'serial_number' => $this->serialNumber,
            'inventory_number' => $this->inventoryNumber,
            'charged' => $this->charged
        ];
    }

    public function createDevice(): void
    {
        Device::create($this->modalInputData());

        $this->isModalVisible = false;
        $this->reset();

        $this->dispatchBrowserEvent('banner-message',  [
            'show' => true,
            'message' => 'Success! New device has been added.',
            'style' => 'success'
        ]);
    }

    public function updateDevice(): void
    {
        Device::whereId($this->deviceId)->update($this->modalInputData());

        $this->isEditModalVisible = false;
        $this->reset();

        $this->dispatchBrowserEvent('banner-message',  [
            'show' => true,
            'message' => 'Success! Device has been updated.',
            'style' => 'success'
        ]);
    }

    public function deleteDevice(): void
    {
        Device::destroy($this->deviceId);
        $this->isDestroyModalVisible = false;

        $this->dispatchBrowserEvent('banner-message',  [
            'show' => true,
            'message' => 'Success! Device has been deleted.',
            'style' => 'success'
        ]);
    }

    public function chargeDeviceToEmployee(): void
    {
        Charge::create([
            'user_id' => User::whereEmail($this->userEmail)->firstOrFail()->id,
            'device_id' => $this->deviceId,
            'date_charged' => now(),
            'date_discharged' => null,
        ]);

        Device::whereId($this->deviceId)->update(['charged' => true]);

        $this->isChargeToEmployeeModalVisible = false;

        $this->reset();

        $this->emit('updateChargesView');

        $this->dispatchBrowserEvent('banner-message',  [
            'show' => true,
            'message' => 'Success! Device has been sucessfully charged to employee.',
            'style' => 'success'
        ]);
    }
}
