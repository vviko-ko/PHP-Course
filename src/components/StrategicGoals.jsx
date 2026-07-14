import { motion } from 'framer-motion';
import { Target, CheckCircle2, Handshake } from 'lucide-react';

export default function StrategicGoals() {
  const goals = [
    {
      icon: <Target className="w-8 h-8 md:w-10 md:h-10 text-white" />,
      title: "Goal 01: Market Entry",
      desc: "Achieve consistent retail presence across Abuja & the FCT within the first 12 months of operation."
    },
    {
      icon: <CheckCircle2 className="w-8 h-8 md:w-10 md:h-10 text-white" />,
      title: "Goal 02: Product Validation",
      desc: "Complete formulation testing and quality benchmarking across the full Neem-based product line."
    },
    {
      icon: <Handshake className="w-8 h-8 md:w-10 md:h-10 text-white" />,
      title: "Goal 03: Strategic Partnerships",
      desc: "Secure distribution, institutional, and supply-chain partnerships to support sustainable scale-up."
    }
  ];

  return (
    <section id="goals" className="py-16 md:py-24 lg:py-32 bg-primary-dark relative overflow-hidden">
      {/* Decorative background elements */}
      <div className="absolute top-0 right-0 w-[400px] md:w-[800px] h-[400px] md:h-[800px] bg-secondary rounded-full mix-blend-multiply opacity-50 -translate-y-1/2 translate-x-1/3 blur-3xl"></div>
      
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div className="text-center max-w-3xl mx-auto mb-12 md:mb-20">
          <span className="text-accent font-bold tracking-wider uppercase text-xs md:text-sm mb-3 md:mb-4 block">Strategic Goals</span>
          <h2 className="text-3xl md:text-4xl lg:text-5xl font-serif text-white">Where We're Focused Right Now</h2>
        </div>
        
        <div className="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
          {goals.map((goal, index) => (
            <motion.div
              key={index}
              initial={{ opacity: 0, scale: 0.95 }}
              whileInView={{ opacity: 1, scale: 1 }}
              viewport={{ once: true, margin: "-50px" }}
              transition={{ duration: 0.8, ease: [0.16, 1, 0.3, 1], delay: index * 0.2 }}
              className="bg-secondary/40 backdrop-blur-xl p-6 md:p-8 lg:p-10 border border-white/10 hover:bg-secondary/60 transition-colors duration-500 group"
            >
              <div className="mb-6 md:mb-8 text-accent">
                {goal.icon}
              </div>
              <h3 className="text-xl md:text-2xl font-serif text-white mb-3 md:mb-4 group-hover:text-accent transition-colors duration-500">{goal.title}</h3>
              <p className="text-white/70 font-light leading-relaxed text-sm md:text-base">{goal.desc}</p>
            </motion.div>
          ))}
        </div>
      </div>
    </section>
  );
}
