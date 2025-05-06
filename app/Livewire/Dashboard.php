<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Agent;
use App\Models\Package;
use App\Models\Product;
use App\Models\Program;
use Livewire\Component;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class Dashboard extends Component
{
    public int $totalAgents = 0;
    public int $totalUsers = 0;
    public int $totalPackages = 0;
    public int $totalPrograms = 0;
    public int $totalProducts = 0;

    public array $recentAgents = [];
    public array $recentPackages = [];
    public array $allPrograms = [];

    public ?string $startDate = null;
    public ?string $endDate = null;

    /**
     * Mount the component.
     *
     * @return void
     */
    public function mount(): void
    {
        // $this->startDate = now()->startOfMonth()->format('Y-m-d');
        // $this->endDate = now()->endOfMonth()->format('Y-m-d');
        $this->allPrograms = Program::all()->pluck('name')->toArray();
        $this->loadStatistics();
        $this->loadRecentData();
    }

    /**
     * Load dashboard statistics.
     *
     * @return void
     */
    protected function loadStatistics(): void
    {
        $this->totalAgents = Agent::count();
        $this->totalUsers = User::count();
        $this->totalPackages = Package::count();
        $this->totalPrograms = Program::count();
        $this->totalProducts = Product::count();
    }

    /**
     * Load recent data for the dashboard.
     *
     * @return void
     */
    protected function loadRecentData(): void
    {
        $this->recentAgents = Agent::with('branch')
            ->latest()
            ->take(5)
            ->get()
            ->toArray();

        $this->recentPackages = Package::with('programs')
            ->latest()
            ->take(5)
            ->get()
            ->toArray();
    }

    /**
     * Render the component.
     *
     * @return View
     */
    public function render(): View
    {
        return view('livewire.dashboard');
    }
} 