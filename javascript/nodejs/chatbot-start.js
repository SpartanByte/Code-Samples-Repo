/**
 * Note: Make sure to install the OpenAI library using npm or yarn before running this code
 * Create an .env file in the root of your project and add your OpenAI API key
 * https://developers.openai.com/api/docs
 * 
 */
import OpenAI from 'openai';

// Initialize the OpenAI client
const openai = new OpenAI({
  apiKey: process.env.OPENAI_API_KEY,
});

async function main() {
  // Test prompt such as a fun fact, a joke, or a question to the AI
  const prompt = "Hi, can you tell me a fun fact?";

  try {
    // Create a chat completion request to get the AI response
    const response = await openai.chat.completions.create({
      model: "gpt-4",
      messages: [{ role: "user", content: prompt }],
      n: 3, // Request 3 different responses, optional
    });
    /**
     * Note: for questions that involve more reasoning, the o3-mini model is better than gpt-4.
     * Make sure to check the OpenAI documentation for more details on the o3-mini model and its capabilities.
     * https://developers.openai.com/api/docs/models/o3-mini
     */

    response.choices.forEach(choice => {
        console.log("Response ", choice.index+1); // Log the index of the response, index from the n parameter + 1
        console.log(choice.message.content);
    });

    // Extract the AI's response from the API result
    const reply = response.choices[0].message.content.trim();

    // Show both sides of the conversation
    console.log("Prompt:", prompt);
    console.log("Response:", reply);
  } catch (error) {
    console.error("Error:", error);
  }
}

// Call the main function
main();