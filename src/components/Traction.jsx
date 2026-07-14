import { motion } from 'framer-motion';

export default function Traction() {
  const stats = [
    { value: "08", label: "Founding Shareholders" },
    { value: "10+", label: "Neem-Based Product Lines" },
    { value: "100%", label: "Natural Active Ingredients" }
  ];

  return (
    <section className="py-12 md:py-16 lg:py-20 bg-primary-dark text-white relative">
      <div className="absolute inset-0 bg-[url('/Images/hero_image.png')] opacity-10 bg-cover bg-center mix-blend-overlay"></div>
      
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div className="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-12 divide-y md:divide-y-0 md:divide-x divide-white/20">
          
          {stats.map((stat, index) => (
            <motion.div
              key={index}
              initial={{ opacity: 0, y: 20 }}
              whileInView={{ opacity: 1, y: 0 }}
              viewport={{ once: true }}
              transition={{ duration: 0.8, ease: [0.16, 1, 0.3, 1], delay: index * 0.2 }}
              className="flex flex-col items-center text-center pt-6 md:pt-0 pb-6 md:pb-0 first:pt-0 last:pb-0"
            >
              <h3 className="text-5xl md:text-6xl lg:text-7xl font-serif text-accent mb-2 md:mb-4">{stat.value}</h3>
              <p className="text-sm md:text-base lg:text-lg font-light tracking-wide uppercase text-white/80">{stat.label}</p>
            </motion.div>
          ))}
          
        </div>
      </div>
    </section>
  );
}
