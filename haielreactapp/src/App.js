import './App.css';
import { WebChatContainer } from '@ibm-watson/assistant-web-chat-react';

function App() {
  return (
    <WebChatContainer
      config={{
        integrationID: "d3261f12-24f9-4ddb-b8ac-fd08320de025", // The ID of this integration.
        region: "us-east", // The region your integration is hosted in.
        serviceInstanceID: "a9fc5d86-c7af-482f-9798-ef511615146b", // The ID of your service instance.
      }}
    />
  );
}

export default App;
