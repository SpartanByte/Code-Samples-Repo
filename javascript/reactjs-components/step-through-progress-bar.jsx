import React, { useState, useEffect } from 'react';
import { Check, Circle } from 'lucide-react'; 
// lucide-react for icons or other icon library
// https://lucide.dev | https://www.npmjs.com/package/lucide-react

/**
 * StepProgress Component
 * * @param {Array} steps - List of step objects { id, label }
 * @param {Array} completedStepIds - IDs from your database field 'completed_steps'
 * @param {number|string} currentStepId - The ID of the step the user is currently on
 */
const StepProgress = ({ steps = [], completedStepIds = [], currentStepId }) => {
  return (
    <div className="w-full py-8 px-4">

        {/* Container for the entire progress bar */}
        <div className="relative flex items-center justify-between w-full max-w-4xl mx-auto">
        
            {/* Background Connector Line */}
            <div className="absolute top-1/2 left-0 w-full h-0.5 bg-gray-300 -translate-y-1/2 z-0" />

                {/* Dynamic Progress Line (matches completed steps) */}
                <div 
                className="absolute top-1/2 left-0 h-0.5 bg-blue-600 -translate-y-1/2 transition-all duration-500 z-0"
                style={{ 
                    width: `${Math.max(0, (steps.findIndex(s => s.id === currentStepId) / (steps.length - 1)) * 100)}%` 
                }}
                />

                    {steps.map((step, index) => {
                    const isCompleted = completedStepIds.includes(step.id);
                    const isCurrent = step.id === currentStepId;
            
                    return (
                        <div key={step.id} className="relative z-10 flex flex-col items-center">

                        {/* Step Icon/Node -- progress indicators */}
                        <div 
                            className={`
                            w-8 h-8 rounded-full flex items-center justify-center border-2 transition-colors duration-300
                            ${isCompleted ? 'bg-emerald-600 border-emerald-600 text-white' : 
                                isCurrent ? 'bg-white border-blue-600 text-blue-600 shadow-[0_0_0_2px_white,0_0_0_4px_#2563eb]' : 
                                'bg-white border-gray-300 text-gray-400'} 
                            `}
                        >
                            {isCompleted ? (
                            <Check size={18} strokeWidth={3} />
                            ) : isCurrent ? (
                            <div className="w-2.5 h-2.5 bg-blue-600 rounded-full" />
                            ) : (
                            <div className="w-1.5 h-1.5 bg-gray-300 rounded-full" />
                            )}
                        </div>

                        {/* Step Label */}
                        <div className="absolute top-10 whitespace-nowrap">
                            <span className={`text-xs font-bold uppercase tracking-wider ${
                                isCompleted || isCurrent ? 'text-blue-900' : 'text-gray-500'
                                }`}>
                                {step.label}
                            </span>
                        </div>
                    </div>
                );
            })}
        </div>
    </div>
  );
};

// Demo wrapper to simulate state management and database values for completed steps and current step
export default function App() {
  const [submission, setSubmission] = useState({
    completed_steps: [1],
    current_step_id: 2
  });

  const allSteps = [
    { id: 1, label: 'Step 1' },
    { id: 2, label: 'Step 2' },
    { id: 3, label: 'Step 3' },
    { id: 4, label: 'Step 4' }
  ];

  // Helper function to simulate moving forward in the process
  const nextStep = () => {
    setSubmission(prev => {
      const nextId = prev.current_step_id + 1;
      if (nextId > allSteps.length + 1) return prev;
      
      return {
        completed_steps: [...prev.completed_steps, prev.current_step_id],
        current_step_id: nextId
      };
    });
  };

  const reset = () => {
    setSubmission({ completed_steps: [], current_step_id: 1 });
  };

  return (
    <div className="min-h-screen bg-gray-50 flex flex-col items-center justify-center p-10 font-sans">
      <div className="w-full max-w-5xl bg-white p-12 rounded-2xl shadow-sm border border-gray-100">
        <h2 className="text-xl font-semibold text-gray-800 mb-12 text-center">Form Submission Progress</h2>
        
            <StepProgress 
            steps={allSteps} 
            completedStepIds={submission.completed_steps}
            currentStepId={submission.current_step_id}
            />

            <div className="mt-24 flex gap-4 justify-center">
                <button 
                    onClick={reset}
                    className="px-6 py-2 border border-gray-300 rounded-lg text-sm font-medium hover:bg-gray-50"
                >
                    Reset
                </button>
                <button 
                    onClick={nextStep}
                    className="px-6 py-2 bg-blue-600 text-white rounded-lg text-sm font-medium hover:bg-blue-700 transition-colors"
                >
                    Continue
                </button>
            </div>
        </div>
    </div>
  );
}