<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <!-- {{ __('Dashboard') }} -->
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg d-flex justify-content-between p-2">
                <div class="p-6 text-gray-900 col-8">
                    {{ __("Eure Majestät ist nun erfolgreich eingeloggt!") }}
                    <br />
                    Jetzt hast du Zugang zum 
                    <a href="{{ url('spell') }}" style="font-weight: bold; color: #007bff; text-decoration: underline;"  title="Zur Zauberliste"> geschützten Bereich. </a>
                <!-- Die über das Formular auf der Seite „Bewerbung“ eingereichten Abfragen werden hier angezeigt.-->
                    @includeIf('_partials.abfrageliste')
                </div>
                <div class="card p-4 col-4">
                    <!-- Liste der Benutzer mit der Rolle „user“ und der Möglichkeit zu activieren\deactivieren -->
                    @includeIf('_partials.hexerliste')	
                </div>
            </div>
            <div class="container bg"> 
                @includeIf('_partials.schools')
            </div>
        </div>
        
    </div>
</x-app-layout>
