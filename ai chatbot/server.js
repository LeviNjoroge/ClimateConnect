const express = require("express");
const { GoogleGenerativeAI } = require("@google/generative-ai");
const dotenv = require("dotenv");

dotenv.config();
const app = express();
const PORT = process.env.PORT || 3000;

// Set up EJS as the view engine
app.set("view engine", "ejs");

// Middleware to parse form data
app.use(express.urlencoded({ extended: true }));
app.use(express.json());

// Google AI API Setup
const genAI = new GoogleGenerativeAI(process.env.GOOGLE_API_KEY);
const model = genAI.getGenerativeModel({ model: "gemini-2.0-flash-thinking-exp-01-21" });

const generationConfig = {
  temperature: 0.7,
  topP: 0.95,
  topK: 64,
  maxOutputTokens: 65536,
  responseMimeType: "text/plain",
};

// Render the chatbot UI
app.get("/", (req, res) => {
  res.render("index", { response: null });
});

// Handle user messages
app.post("/chat", async (req, res) => {
  const userMessage = req.body.message;

  try {
    const chatSession = model.startChat({ generationConfig });
    const result = await chatSession.sendMessage(userMessage);
    const botResponse = result.response.text();

    res.render("index", { response: botResponse });
  } catch (error) {
    console.error("Error:", error);
    res.render("index", { response: "Error processing your request." });
  }
});

// Start the server
app.listen(PORT, () => {
  console.log(`Server running on http://localhost:${PORT}`);
});
