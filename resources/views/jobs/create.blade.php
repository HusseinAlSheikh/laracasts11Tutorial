<x-layout >
    <x-slot:title>
        Create Job
    </x-slot:title>
    <x-slot:heading>
        Create New Job 
    </x-slot:heading>
  
<form method="POST" action="/jobs"> 
    @csrf
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          
          <x-form-field>
              <x-form-label for="'title'" > Title </x-form-label>
              <div class="mt-2">
                <x-form-input 
                  type="text" name="title" id="title" autocomplete="title" placeholder="Do Some Task" 
                  :inputName="'title'"
                />
                <x-form-error :inputName="'title'"/>
              </div>
          </x-form-field>

          <x-form-field>
            <x-form-label for="'salary'" > Salary </x-form-label>
            <div class="mt-2">
              <x-form-input 
                  type="text" name="salary" id="salary" autocomplete="salary" placeholder="1,500 $" 
                 :inputName="'salary'"
              />
              <x-form-error :inputName="'salary'"/>
            </div>
          </x-form-field>
          
         

        </div>
        
          
      </div>
  
  
    </div>
  
    <div class="mt-6 flex items-center justify-end gap-x-6">
      <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
      <x-form-button  >Save</x-form-button>
    </div>
  </form>
  


</x-layout>